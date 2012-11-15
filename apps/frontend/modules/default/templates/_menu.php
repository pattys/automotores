<ul class="nav">
  <li class="active"><a href="<?php echo url_for("auto/index");?>">Autos</a></li>
  <li><a href="<?php echo url_for("chofer/index");?>">Choferes</a></li>
  <li><a href="<?php echo url_for("salir/index");?>">Salir</a></li>
  <li class="dropdown">
    <!--<a<href="#" class="dropdown-toggle" data-toggle="dropdown">
      menu 4 <b class="caret"></b>
    </a>-->
    <ul class="dropdown-menu">
      <li><a href="#">add your own...</a></li>
      <li><a href="#">...is quite easy!</a></li>
      <li class="dropdown-submenu">
        <a tabindex="-1" href="#">More options</a>
          <ul class="dropdown-menu">
            <li><a href="#">sub1</a></li>
            <li><a href="#">sub2</a></li>
            <li><a href="#">sub3</a></li>
          </ul>
      </li>
    </ul>
  </li>
</ul>