import tensorflow as tf
import numpy as np
import os
import pickle
import pandas as pd  # Import pandas untuk menyimpan ke Excel
from sklearn.metrics import confusion_matrix, classification_report
import matplotlib.pyplot as plt
import shutup; shutup.please()
import seaborn as sns
from tensorflow.keras.preprocessing.image import ImageDataGenerator

# Load model yang telah disimpan
model = tf.keras.models.load_model('vgg19_classification_model.keras')

# Memuat label kelas dari file class_indices.pkl
with open('class_indices.pkl', 'rb') as f:
    class_indices = pickle.load(f)
class_labels = {v: k for k, v in class_indices.items()}  # Membalik dictionary untuk mendapatkan label dari indeks

# Direktori data uji
validation_dir = 'uploads/test'

# Menggunakan ImageDataGenerator untuk preprocessing data uji
test_datagen = ImageDataGenerator(rescale=1.0/255)

# Membuat generator data uji
test_generator = test_datagen.flow_from_directory(
    validation_dir,
    target_size=(224, 224),
    batch_size=32,
    class_mode='categorical',
    shuffle=False  # Nonaktifkan shuffle untuk menjaga urutan data
)

# Melakukan prediksi pada data uji
predictions = model.predict(test_generator, verbose=0)
predicted_classes = np.argmax(predictions, axis=1)
true_classes = test_generator.classes
class_labels_list = list(class_labels.values())

# Menghitung confusion matrix
conf_matrix = confusion_matrix(true_classes, predicted_classes)

# Menampilkan laporan klasifikasi
print("Classification Report:")
print(classification_report(true_classes, predicted_classes, target_names=class_labels_list))

# Menyimpan hasil prediksi ke DataFrame
results = pd.DataFrame({
    'True Class': [class_labels_list[i] for i in true_classes],
    'Predicted Class': [class_labels_list[i] for i in predicted_classes]
})

# Menyimpan DataFrame ke file Excel
results.to_excel('predictions_results.xlsx', index=False)

# Menampilkan confusion matrix menggunakan heatmap
plt.figure(figsize=(10, 8))
sns.heatmap(conf_matrix, annot=True, fmt="d", cmap="Blues", xticklabels=class_labels_list, yticklabels=class_labels_list)
plt.xlabel("Predicted Label")
plt.ylabel("True Label")
plt.title("Confusion Matrix")
plt.show()
