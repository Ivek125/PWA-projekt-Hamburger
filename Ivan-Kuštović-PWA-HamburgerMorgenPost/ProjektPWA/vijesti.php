<?php while($row = mysqli_fetch_array($result)): ?>
            <article>
            <a class="article-link" href="clanak.php?id=<?= $row["article_id"] ?>">
                <img src="./slike/<?= $row["image"] ?>">
                <h3><?= $row['title']; ?></h3>
                <p><?= $row['shortContent'] ?></p>
              </a>
              <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true && $_SESSION['role'] == 'admin'): ?>
                <a class="edit-btn" href="urediClanak.php?id=<?= $row['article_id'] ?>">Edit</a>
                <a class="delete-btn" href="izbrisiClanak.php?id=<?= $row['article_id'] ?>" onclick="return confirm('Jeste li sigurni da želite obrisati ovaj članak?');">Delete</a>
                <?php endif; ?>
            </article>
          <?php endwhile; ?>




      