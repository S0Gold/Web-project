
<header>
      <div class="container">
          <img src="include/logo.png" alt="50gold" height="50" class="logo" />
          <nav>
              <ul>
                  <li><a href="index">Home</a></li>
                  <li><a href="#">About</a></li>
                  <li><a href="my_items">Anunturile mele</a></li>
                  <li><a href="add_item">Adauga</a></li>
                  <?php
                        if(isset($_SESSION["usersession"]) )
                            echo '<li><a href="logout">LogOut</a></li> ' ;
                        else
                          echo '<li><a href="login">LogIn</a></li> ' ;
                    ?>
              </ul>
          </nav>
      </div>
  </header>
