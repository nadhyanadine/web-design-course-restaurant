<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $full_name = $_POST['full_name'];
    $display_name = $_POST['display_name'];
    $profile_picture = $_FILES['profile_picture']['name'];
    $description = $_POST['description'];
    $occupation = $_POST['occupation'];
    $skills = $_POST['skills'];
    $experience_level = $_POST['experience_level'];
    $education_country = $_POST['education_country'];
    $education_college = $_POST['education_college'];
    $education_major = $_POST['education_major'];
    $education_year = $_POST['education_year'];
    $education_title = $_POST['education_title'];
    $certification = $_POST['certification'];
    $personal_website = $_POST['personal_website'];
    $email = $_POST['email'];
    $phone_number = $_POST['phone_number'];

    $target_dir = "uploads/";
    // Buat direktori jika belum ada
    if (!is_dir($target_dir)) {
        mkdir($target_dir, 0777, true);
    }

    $target_file = $target_dir . basename($profile_picture);

    // Cek apakah file berhasil diunggah
    if (move_uploaded_file($_FILES['profile_picture']['tmp_name'], $target_file)) {
        $sql = "INSERT INTO register_freelancer (full_name, display_name, profile_picture, description, occupation, skills, experience_level, education_country, education_college, education_major, education_year, education_title, certification, personal_website, email, phone_number)
        VALUES ('$full_name', '$display_name', '$profile_picture', '$description', '$occupation', '$skills', '$experience_level', '$education_country', '$education_college', '$education_major', '$education_year', '$education_title', '$certification', '$personal_website', '$email', '$phone_number')";

        if ($conn->query($sql) === TRUE) {
            // Arahkan pengguna ke browse.job.php setelah berhasil
            header('Location: ../browse_job/browse_job.php');
            exit();
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Maaf, terjadi kesalahan saat mengunggah file.";
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>DevHive Pendaftaran Freelancer</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="container">
        <h1>DevHive Freelancer</h1>
        <h2>Daftar sebagai freelancer di DevHive</h2>
        <form action="register.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="full_name">Nama Lengkap:</label>
                <input type="text" id="full_name" name="full_name" required>
            </div>
            
            <div class="form-group">
                <label for="display_name">Nama Tampilan:</label>
                <input type="text" id="display_name" name="display_name" required>
            </div>
            
            <div class="form-group">
                <label for="profile_picture">Foto Profil:</label>
                <input type="file" id="profile_picture" name="profile_picture" required>
            </div>
            
            <div class="form-group">
                <label for="description">Deskripsi:</label>
                <textarea id="description" name="description" required></textarea>
            </div>
            
            <div class="form-group">
                <label for="occupation">Pekerjaan Anda:</label>
                <select id="occupation" name="occupation" required>
                    <option value="Software programmer/Developer">Software programmer/Developer</option>
                    <option value="Network Specialist">Network Specialist</option>
                    <option value="Data Analyst">Data Analyst</option>
                    <option value="Graphic & Design">Graphic & Design</option>
                    <option value="Data Base Administrator">Data Base Administrator</option>
                    <option value="Information Security Specialist">Information Security Specialist</option>
                </select>
            </div>
            
            <div class="form-group">
                <label for="skills">Keahlian:</label>
                <select id="skills" name="skills" required>
                    <option value="JavaScript">JavaScript</option>
                    <option value="PHP">PHP</option>
                    <option value="Python">Python</option>
                    <option value="SQL">SQL</option>
                    <option value="C++">C++</option>
                </select>
            </div>
            
            <div class="form-group">
                <label for="experience_level">Tingkat Pengalaman:</label>
                <select id="experience_level" name="experience_level" required>
                    <option value="Beginner">Beginner</option>
                    <option value="Intermediate">Intermediate</option>
                    <option value="Expert">Expert</option>
                </select>
            </div>
            
            <div class="form-group">
                <label for="education_country">Negara Perguruan Tinggi:</label>
                <input type="text" id="education_country" name="education_country" required>
            </div>
            
            <div class="form-group">
                <label for="education_college">Nama Perguruan Tinggi:</label>
                <input type="text" id="education_college" name="education_college" required>
            </div>
            
            <div class="form-group">
                <label for="education_major">Jurusan:</label>
                <input type="text" id="education_major" name="education_major" required>
            </div>
            
            <div class="form-group">
                <label for="education_year">Tahun:</label>
                <input type="text" id="education_year" name="education_year" required>
            </div>
            
            <div class="form-group">
                <label for="education_title">Gelar:</label>
                <input type="text" id="education_title" name="education_title" required>
            </div>
            
            <div class="form-group">
                <label for="certification">Sertifikasi:</label>
                <textarea id="certification" name="certification"></textarea>
            </div>
            
            <div class="form-group">
                <label for="personal_website">Website Pribadi:</label>
                <input type="url" id="personal_website" name="personal_website">
            </div>
            
            <div class="form-group">
                <label for="email">Tambahkan Email:</label>
                <input type="email" id="email" name="email" required>
            </div>
            
            <div class="form-group">
                <label for="phone_number">Tambahkan Nomor Telepon:</label>
                <input type="tel" id="phone_number" name="phone_number" required>
            </div>
            
            <button type="submit" class="btn-submit">Selesai</button>
        </form>
    </div>
</body>
</html>
