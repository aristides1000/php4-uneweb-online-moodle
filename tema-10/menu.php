<?php
  class Menu
  {
    private $enlace = array();
    private $titulo = array();

    public function opcion($en, $ti)
    {
      $this->enlace[] = $en;
      $this->titulo[] = $ti;
    }
    public function MenuHorizontal()
    {
      for ($i = 0; $i < count($this->enlace); $i++) {
        echo '<a href="' . $this->enlace[$i] . '">' . $this->titulo[$i] . '</a>';
        if ($i < count($this->enlace) - 1) {
          echo ' - ';
        }
      }
    }
    public function MenuVertical()
    {
      for ($i = 0; $i < count($this->enlace); $i++) {
        echo '<a href="' . $this->enlace[$i] . '">' . $this->titulo[$i] . '</a>';
        echo '<br>';
      }
    }
  }

  $Menu1 = new Menu();
  $Menu1->opcion("https://www.youtube.com/?hl=ES", "Youtube");
  $Menu1->opcion("https://www.google.com", "Google");
  $Menu1->opcion("https://x.com/", "X");
  $Menu1->MenuHorizontal();

  echo '<hr>';

  $Menu2 = new Menu();
  $Menu2->opcion("https://www.twitch.tv/", "Twitch");
  $Menu2->opcion("https://www.gmail.com", "Gmail");
  $Menu2->opcion("https://www.reddit.com/", "Reddit");
  $Menu2->MenuVertical();
?>