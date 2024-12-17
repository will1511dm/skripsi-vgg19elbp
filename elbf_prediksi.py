import cv2
import numpy as np
from skimage import feature
import os
import shutil

def elbp(image, radius=1, n_points=8):
    # Mengubah gambar menjadi grayscale
    gray = cv2.cvtColor(image, cv2.COLOR_BGR2GRAY)
    
    # Menghitung ELBP
    lbp = feature.local_binary_pattern(gray, n_points, radius, method="uniform")
    
    return lbp

def clear_folder(path):
    # Menghapus folder jika ada, kemudian membuat ulang folder kosong
    if os.path.exists(path):
        shutil.rmtree(path)
    os.makedirs(path)

def process_images_from_folder(folder_path, save_path):
    # Mengosongkan folder train
    clear_folder(save_path)
    
    # Mengulangi setiap folder dan file dalam folder
    for root, dirs, files in os.walk(folder_path):
        for filename in files:
            if filename.endswith('.jpg') or filename.endswith('.png')or filename.endswith('.jpeg'):  # Menyaring jenis file gambar
                # Memuat gambar
                image_path = os.path.join(root, filename)
                image = cv2.imread(image_path)
                
                if image is not None:  # Memeriksa apakah gambar berhasil dimuat
                    # Ekstraksi fitur ELBP
                    lbp_image = elbp(image)
                    
                    # Mengonversi hasil ELBP menjadi gambar
                    lbp_image = (lbp_image * 255 / lbp_image.max()).astype(np.uint8)
                    
                    # Menentukan path penyimpanan dengan mempertahankan struktur subfolder
                    relative_path = os.path.relpath(root, folder_path)
                    save_folder = os.path.join(save_path, relative_path)
                    
                    if not os.path.exists(save_folder):
                        os.makedirs(save_folder)
                    
                    # Simpan gambar ELBP dengan nama file yang sama
                    save_file_path = os.path.join(save_folder, f'{os.path.splitext(filename)[0]}_elbp.jpg')
                    cv2.imwrite(save_file_path, lbp_image)

# Folder tempat gambar berada dan folder untuk menyimpan hasil ekstraksi
folder_path = 'uploads/Prediksi'
save_path = 'uploads/Prediksi_ciri'

# Memproses semua gambar dalam folder dan subfolder, serta menyimpan hasil ekstraksi
process_images_from_folder(folder_path, save_path)
