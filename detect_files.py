import os
import magic

ALLOWED_EXTENSIONS = ['jpg', 'jpeg']

def allowed_file(filename):
    return '.' in filename and \
           filename.rsplit('.', 1)[1].lower() in ALLOWED_EXTENSIONS

def check_file_type(file_path):
    mime_type = magic.from_file(file_path, mime=True)
    if mime_type == 'image/jpeg':
        return True
    return False

def upload_file(file):
    if file and allowed_file(file.filename):
        file_path = os.path.join('upload_folder', file.filename)
        file.save(file_path)
        
        if check_file_type(file_path):
            print("Dosya başarıyla yüklendi: ", file.filename)
        else:
            os.remove(file_path)
            print("Geçersiz dosya türü: ", file.filename)
    else:
        print("Dosya yüklenemedi: Geçersiz dosya uzantısı")

# Kullanım örneği
uploaded_file = "example.jpg"  # Kullanıcının yüklediği dosya
upload_file(uploaded_file)
