<?php
function getProvinces($conn) {
    $sql = "SELECT * FROM provinces";
    $result = $conn->query($sql);
    $provinces = [];
    
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $provinces[] = $row;
        }
    }
    return $provinces;
}

function updateProfile($conn, $data) {
    $stmt = $conn->prepare("UPDATE users SET name=?, email=?, password=?, province=?, company_description=? WHERE id=?");
    $stmt->bind_param("sssssi", $data['name'], $data['email'], $data['password'], $data['province'], $data['company_description'], $data['id']);
    return $stmt->execute();
}

function updateProfilePic($conn, $user_id, $profile_pic) {
    $stmt = $conn->prepare("UPDATE users SET profile_pic=? WHERE id=?");
    $stmt->bind_param("si", $profile_pic, $user_id);
    return $stmt->execute();
}
?>
