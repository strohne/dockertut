<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Herzlichen Glückwunsch! 🎉</title>
  </head>
  <body> 
    
    <h1>Willkommen in der Dockerwelt. </h1>    
    
    <p>
    Wenn Sie diese Seite im Browser sehen, 
    dann haben Sie vermutlich eine verzweigte Reise durch die Kommandozeilen hinter sich. 
    Herzlichen Glückwunsch! 🎉
    </p>

    <p>
      Im Folgenden wird versucht, Daten aus einer Datenbank abzufragen. 
      Legen Sie dazu vorher im sql-Container die Datenbank "myfirstdb mit der Tabelle "pages" an. Die Tabelle benötigt die Spalten "caption" und "content".
    </p>
    
    <?php
        //Connect to SQL database
        try {
            $pdo = new PDO('mysql:host=sql;charset=utf8mb4;dbname=myfirstdb', 'root', 'root');
        
            $statement = $pdo->query("SELECT * FROM pages LIMIT 10");
            
            if (!$statement) {
              $rows = [];
            } else {
              $rows = $statement->fetchAll();    
            }
        
            $errors = $pdo->errorInfo()[2];
            
        } catch (PDOException $e) {
          $errors = $e->getMessage();
          $rows = [];
        }  
    ?>

    <?php if (!empty($errors)): ?>
        <p>
          Konnte keine Daten abfragen: <?= $errors ?>
        </p>
    <?php endif; ?>  
      
    <table>
      <thead>
      <tr>
        <td>Caption</td>
        <td>Content</td>
      </tr>
      </thead>
      
      <tbody>
      
      <?php foreach($rows as $row) :?>
        <tr>
          <td><?= $row['caption'] ?? '' ?></td>
          <td><?= $row['content'] ?? '' ?></td>
        </tr>
      <?php endforeach;?>
      </tbody>
    </table>

  </body>
</html>
