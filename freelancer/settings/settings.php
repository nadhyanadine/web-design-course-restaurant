<?php
include '../register/config.php';

if (isset($_POST['delete'])) {
    $id = $_POST['id'];
    $sql = "DELETE FROM register_freelancer WHERE id='$id'";
    $conn->query($sql);
}

if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $full_name = $_POST['full_name'];
    $display_name = $_POST['display_name'];
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

    $sql = "UPDATE register_freelancer SET 
            full_name='$full_name',
            display_name='$display_name',
            description='$description',
            occupation='$occupation',
            skills='$skills',
            experience_level='$experience_level',
            education_country='$education_country',
            education_college='$education_college',
            education_major='$education_major',
            education_year='$education_year',
            education_title='$education_title',
            certification='$certification',
            personal_website='$personal_website',
            email='$email',
            phone_number='$phone_number' 
            WHERE id='$id'";

    $conn->query($sql);
}

$sql = "SELECT * FROM register_freelancer";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Freelancer Settings</title>
    <link rel="stylesheet" type="text/css" href="stylesettings.css">
</head>
<body>
    <div class="container">
        <h1>Freelancer Settings</h1>
        <?php while($row = $result->fetch_assoc()): ?>
        <form action="settings.php" method="post">
            <table>
                <tr>
                    <td>Full Name</td>
                    <td><input type="text" name="full_name" value="<?php echo isset($row['full_name']) ? $row['full_name'] : ''; ?>"></td>
                </tr>
                <tr>
                    <td>Display Name</td>
                    <td><input type="text" name="display_name" value="<?php echo isset($row['display_name']) ? $row['display_name'] : ''; ?>"></td>
                </tr>
                <tr>
                    <td>Description</td>
                    <td><textarea name="description"><?php echo isset($row['description']) ? $row['description'] : ''; ?></textarea></td>
                </tr>
                <tr>
                    <td>Occupation</td>
                    <td><input type="text" name="occupation" value="<?php echo isset($row['occupation']) ? $row['occupation'] : ''; ?>"></td>
                </tr>
                <tr>
                    <td>Skills</td>
                    <td><input type="text" name="skills" value="<?php echo isset($row['skills']) ? $row['skills'] : ''; ?>"></td>
                </tr>
                <tr>
                    <td>Experience Level</td>
                    <td><input type="text" name="experience_level" value="<?php echo isset($row['experience_level']) ? $row['experience_level'] : ''; ?>"></td>
                </tr>
                <tr>
                    <td>Country</td>
                    <td><input type="text" name="education_country" value="<?php echo isset($row['education_country']) ? $row['education_country'] : ''; ?>"></td>
                </tr>
                <tr>
                    <td>College</td>
                    <td><input type="text" name="education_college" value="<?php echo isset($row['education_college']) ? $row['education_college'] : ''; ?>"></td>
                </tr>
                <tr>
                    <td>Major</td>
                    <td><input type="text" name="education_major" value="<?php echo isset($row['education_major']) ? $row['education_major'] : ''; ?>"></td>
                </tr>
                <tr>
                    <td>Year</td>
                    <td><input type="text" name="education_year" value="<?php echo isset($row['education_year']) ? $row['education_year'] : ''; ?>"></td>
                </tr>
                <tr>
                    <td>Title</td>
                    <td><input type="text" name="education_title" value="<?php echo isset($row['education_title']) ? $row['education_title'] : ''; ?>"></td>
                </tr>
                <tr>
                    <td>Certification</td>
                    <td><textarea name="certification"><?php echo isset($row['certification']) ? $row['certification'] : ''; ?></textarea></td>
                </tr>
                <tr>
                    <td>Website</td>
                    <td><input type="url" name="personal_website" value="<?php echo isset($row['personal_website']) ? $row['personal_website'] : ''; ?>"></td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td><input type="email" name="email" value="<?php echo isset($row['email']) ? $row['email'] : ''; ?>"></td>
                </tr>
                <tr>
                    <td>Phone Number</td>
                    <td><input type="tel" name="phone_number" value="<?php echo isset($row['phone_number']) ? $row['phone_number'] : ''; ?>"></td>
                </tr>
                <tr>
                    <td>
                        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                        <button type="submit" name="update" class="btn-update">Update</button>
                        <button type="submit" name="delete" class="btn-delete">Delete</button>
                    </td>
                </tr>
            </table>
        </form>
        <br>
        <?php endwhile; ?>
    </div>
</body>
</html>

<?php $conn->close(); ?>
