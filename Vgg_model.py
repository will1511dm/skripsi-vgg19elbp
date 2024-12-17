import shutup; shutup.please()
import tensorflow as tf
import numpy as np
import random
from tensorflow.keras import layers, models
from tensorflow.keras.preprocessing.image import ImageDataGenerator
from tensorflow.keras.optimizers import Adam
from tensorflow.keras.utils import plot_model
import pickle
import matplotlib.pyplot as plt

# Direktori data pelatihan dan validasi
train_dir = 'uploads/Train'
validation_dir = 'uploads/val'

# Augmentasi gambar dengan pengaturan lebih rendah
train_datagen = ImageDataGenerator(
    rescale=1.0 / 255,
    rotation_range=20,
    width_shift_range=0.1,
    height_shift_range=0.1,
    shear_range=0.1,
    zoom_range=0.1,
    horizontal_flip=True,
    fill_mode='nearest'
)

validation_datagen = ImageDataGenerator(rescale=1.0 / 255)

# Membuat generator dengan seed yang sama untuk konsistensi
train_generator = train_datagen.flow_from_directory(
    train_dir,
    target_size=(224, 224),
    batch_size=32,
    class_mode='categorical'
)

validation_generator = validation_datagen.flow_from_directory(
    validation_dir,
    target_size=(224, 224),
    batch_size=32,
    class_mode='categorical'
)

# Mendapatkan label kelas
class_indices = train_generator.class_indices
with open('class_indices.pkl', 'wb') as f:
    pickle.dump(class_indices, f)

# Memuat model VGG19 tanpa lapisan klasifikasi terakhir
base_model = tf.keras.applications.VGG19(weights='imagenet', include_top=False, input_shape=(224, 224, 3))
base_model.trainable = True

# Membekukan sebagian besar lapisan VGG19 dan membuka beberapa lapisan terakhir
for layer in base_model.layers[:-5]:
    layer.trainable = False

# Menambahkan lapisan klasifikasi tambahan
model = models.Sequential([
    base_model,
    layers.Flatten(),
    layers.Dense(512, activation='relu'),
    layers.Dropout(0.5),
    layers.Dense(len(class_indices), activation='softmax')
])

# Menampilkan ringkasan model
model.summary()

# Plot dan simpan diagram model
plot_model(
    model,
    to_file='model_architecture.png',
    show_shapes=True,
    show_layer_names=True,
    dpi=96
)
print("Diagram arsitektur model disimpan sebagai model_architecture.png")

# Mengompilasi model dengan learning rate yang lebih kecil
optimizer = Adam(learning_rate=0.001)
model.compile(optimizer=optimizer,
              loss='categorical_crossentropy',
              metrics=['accuracy'])

# Melatih model
history = model.fit(
    train_generator,
    steps_per_epoch=5 // train_generator.batch_size,
    validation_data=validation_generator,
    validation_steps=2 // validation_generator.batch_size,
    epochs=200
)

# Evaluasi model
loss, accuracy = model.evaluate(validation_generator)

# Menampilkan grafik akurasi dan loss
plt.figure(figsize=(12, 5))

# Plot untuk Akurasi
plt.subplot(1, 2, 1)
plt.plot(history.history['accuracy'], label='Training Accuracy')
plt.plot(history.history['val_accuracy'], label='Validation Accuracy')
plt.xlabel('Epoch')
plt.ylabel('Accuracy')
plt.title('Training and Validation Accuracy')
plt.legend()

# Plot untuk Loss
plt.subplot(1, 2, 2)
plt.plot(history.history['loss'], label='Training Loss')
plt.plot(history.history['val_loss'], label='Validation Loss')
plt.xlabel('Epoch')
plt.ylabel('Loss')
plt.title('Training and Validation Loss')
plt.legend()

plt.tight_layout()

# Simpan grafik dalam bentuk gambar
plt.savefig('training_validation_accuracy_loss.png')
plt.show()

# Menyimpan model dalam format .keras
model.save('vgg19_classification_model.keras')
print("Model disimpan sebagai vgg19_classification_model.keras")
