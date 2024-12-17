import tensorflow as tf
import numpy as np
import pickle
from tensorflow.keras.preprocessing import image
import mysql.connector
# Koneksi ke database MySQL di localhost
db = mysql.connector.connect(
    host="localhost",
    user="root",           # Sesuaikan dengan user MySQL Anda
    password="",            # Sesuaikan dengan password MySQL Anda
    database="db_vgg"  # Nama database 
)
cursor = db.cursor()

# Memuat model yang telah disimpan
model = tf.keras.models.load_model('vgg19_classification_model.keras')

# Memuat label kelas dari file class_indices.pkl
with open('class_indices.pkl', 'rb') as f:
    class_indices = pickle.load(f)
class_labels = {v: k for k, v in class_indices.items()}  # Membalik dictionary untuk mendapatkan label dari indeks

# Path gambar yang ingin diprediksi
image_path = 'uploads/Prediksi_ciri/1_elbp.jpg'

def predict_image(img_path):
    # Memuat dan memproses gambar
    img = image.load_img(img_path, target_size=(224, 224))
    img_array = image.img_to_array(img)
    img_array = np.expand_dims(img_array, axis=0)  # Menambah dimensi batch
    img_array /= 255.0  # Normalisasi seperti saat pelatihan

    # Melakukan prediksi dengan verbose=0 untuk menonaktifkan output detail
    predictions = model.predict(img_array, verbose=0)
    predicted_class_index = np.argmax(predictions, axis=1)[0]
    predicted_class_label = class_labels[predicted_class_index]
    confidence = predictions[0][predicted_class_index]

    return predicted_class_label, confidence

def insert_prediction_to_db(file_name, label, confidence):
    # Query SQL untuk menyisipkan data prediksi ke tabel
    sql = "INSERT INTO data_history (nama_file, hasil, confidence) VALUES (%s, %s, %s)"
    values = (file_name, label, float(confidence))  # Konversi confidence menjadi float
    cursor.execute(sql, values)
    db.commit()


# Melakukan prediksi pada gambar yang ditentukan
label, confidence = predict_image(image_path)
print(f"Hasil Identifikasi Mineral: {label} dengan Keyakinan Prediksi {confidence:.2f}")

# Menyimpan hasil prediksi ke dalam database
file_name = image_path.split('/')[-1]  # Mendapatkan nama file dari path
insert_prediction_to_db(file_name, label, confidence)

# Menutup koneksi database
cursor.close()
db.close()
