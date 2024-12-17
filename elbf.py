import cv2
import numpy as np
from skimage import feature
import os
import random
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

def process_images_from_folder(folder_path, train_save_path, val_save_path, val_ratio=0.2):
    # Mengosongkan folder train dan val
    clear_folder(train_save_path)
    clear_folder(val_save_path)
    
    # Mengulangi setiap folder dan file dalam folder
    for root, dirs, files in os.walk(folder_path):
        # Mengambil semua file gambar dalam folder saat ini
        image_files = [f for f in files if f.endswith('.jpg') or f.endswith('.png')or f.endswith('.jpeg')]
        num_files = len(image_files)
        
        # Menghitung jumlah data yang akan disimpan di val
        val_count = int(num_files * val_ratio)
        
        # Mengacak file untuk pemisahan
        selected_for_val = random.sample(image_files, val_count) if val_count > 0 else []

        for filename in image_files:
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
                
                # Simpan ke folder Train
                train_save_folder = os.path.join(train_save_path, relative_path)
                if not os.path.exists(train_save_folder):
                    os.makedirs(train_save_folder)
                
                train_save_file_path = os.path.join(train_save_folder, f'{os.path.splitext(filename)[0]}_elbp.jpg')
                cv2.imwrite(train_save_file_path, lbp_image)
                
                # Simpan ke folder Val jika termasuk dalam pilihan
                if filename in selected_for_val:
                    val_save_folder = os.path.join(val_save_path, relative_path)
                    if not os.path.exists(val_save_folder):
                        os.makedirs(val_save_folder)
                    
                    val_save_file_path = os.path.join(val_save_folder, f'{os.path.splitext(filename)[0]}_elbp.jpg')
                    cv2.imwrite(val_save_file_path, lbp_image)

# Folder tempat gambar berada dan folder untuk menyimpan hasil ekstraksi
folder_path = 'master/Train'
train_save_path = 'uploads/Train'
val_save_path = 'uploads/val'

# Memproses semua gambar dalam folder dan subfolder, serta menyimpan hasil ekstraksi
process_images_from_folder(folder_path, train_save_path, val_save_path)
