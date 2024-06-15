<?php
include 'includes/db.php';
include 'includes/functions.php';

session_start();
$user_id = 1; // Contoh user ID yang sudah login

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $data = [
        'name' => $_POST['name'],
        'email' => $_POST['email'],
        'password' => password_hash($_POST['password'], PASSWORD_BCRYPT),
        'province' => $_POST['province'],
        'company_description' => $_POST['company_description'],
        'id' => $user_id
    ];
    updateProfile($conn, $data);
    
    // Cek dan unggah foto profil jika ada
    if (!empty($_FILES['profile_pic']['name'])) {
        $target_dir = "uploads/profile_pics/";
        $target_file = $target_dir . basename($_FILES["profile_pic"]["name"]);
        if (!file_exists($target_dir)) {
            mkdir($target_dir, 0777, true);
        }
        if (move_uploaded_file($_FILES["profile_pic"]["tmp_name"], $target_file)) {
            updateProfilePic($conn, $user_id, basename($_FILES["profile_pic"]["name"]));
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}

// Ambil data pengguna saat ini
$sql = "SELECT * FROM users WHERE id=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$user = $stmt->get_result()->fetch_assoc();

$provinces = getProvinces($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Settings</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body class="light-theme">

    <div class="settings-container">
        <div class="homebtn">
        <a href="../dashboard/dashboard.html" class="btn btn-primary">HOME</a>
        </div>
        <div class="profile-pic-container">
            <img src="uploads/profile_pics/<?php echo $user['profile_pic']; ?>" alt="Profile Picture" class="profile-pic">
        </div>
        <center><h1>Profile Settings</h1></center>
        <form action="settings.php" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo $user_id; ?>">
            <label for="profile_pic">Change Profile Picture:</label>
            <input type="file" id="profile_pic" name="profile_pic">
            <label for="theme">Theme:</label>
            <select name="theme" id="theme">
                <option value="light">Light</option>
                <option value="dark">Dark</option>
            </select>
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($user['name']); ?>">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($user['email']); ?>">
            <label for="password">Password:</label>
            <input type="password" id="password" name="password">
            <label for="province">Province:</label>
            <select id="province" name="province">
                <?php foreach ($provinces as $province): ?>
                    <option value="<?php echo $province['id']; ?>" <?php echo ($province['id'] == $user['province']) ? 'selected' : ''; ?>>
                        <?php echo $province['name']; ?>
                    </option>
                <?php endforeach; ?>
            </select>
            <label for="company_description">Company Description:</label>
            <textarea id="company_description" name="company_description"><?php echo htmlspecialchars($user['company_description']); ?></textarea>
            <button type="submit">Save Changes</button>
        </form>
        <div class="profile-summary">
            <h2>Profile Summary</h2>
            <div class="profile-pic-container">
                <img src="uploads/profile_pics/<?php echo $user['profile_pic']; ?>" alt="Profile Picture" class="profile-pic">
            </div>
            <p><strong>Name:</strong> <?php echo htmlspecialchars($user['name']); ?></p>
            <p><strong>Email:</strong> <?php echo htmlspecialchars($user['email']); ?></p>
            <p><strong>Province:</strong> <?php echo htmlspecialchars(array_column($provinces, 'name', 'id')[$user['province']]); ?></p>
            <p><strong>Company Description:</strong> <?php echo htmlspecialchars($user['company_description']); ?></p>
        </div>
    </div>

    <script src="js/script.js"></script>
</body>
</html>
