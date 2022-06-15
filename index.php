<?php
include './conn.php';
    $sql='SELECT `id`, `name`, `status`, `date` FROM `todo`';
    $exc=$pdo->prepare($sql);
    $exc->execute(array());

if(isset($_POST['submit'])){
    // echo 'submit it';
    $todo= $_POST['todoname'];
    $sql='INSERT INTO `todo`( `name`) VALUES (?)';
    $exc=$pdo->prepare($sql);
    $exc->execute(array($todo));
    header('Location: index.php');

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todo</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
    <div class='container'>
            <form method='post'>
                <div class="mb-3">
                    <label for="todo" class="form-label">Todo name</label>
                    <input type="text" class="form-control" id="todo" name='todoname'>
                    <div id="emailHelp" class="form-text">please enter your todo.</div>
                </div>


                <button type="submit" name='submit' class="btn btn-primary">Add</button>
            </form>

            <br>
            <br>
        <h4>Todo s</h4>
        <table class=" table table-dark table-striped">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">name</th>
            <th scope="col">status</th>
            <th scope="col">date</th>
            <th scope="col">delete</th>
            <th scope="col">update</th>

            </tr>
        </thead>
        <tbody>
            <?php
            while($row=$exc->fetch()){
                $status='not completed';
                $completebtn='<td><a href="update.php?id='.$row['id'].'" class="btn btn-success">completed</a> </td>';
                if($row['status']=='true'){
                    $status='completed';
                    $completebtn='<td> </td>';
                }
                echo '<tr>
                <th scope="row">'.$row['id'].'</th>
                <td>'.$row['name'].'</td>
                <td>'.$status.'</td>
                <td>'.$row['date'].'</td>
                <td><a href="delete.php?id='.$row['id'].'" class="btn btn-danger">Delete</a> </td>
                '.$completebtn.'

                </tr> ';
            }

            ?>

            
        </tbody>
        </table>

    </div>
    


</body>
</html>