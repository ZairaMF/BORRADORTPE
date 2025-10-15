<ul class="barraNavegacion">
          <li class="nav">AVENTURA TIME</li>
          <?php if($this->user): ?>
            <span> <?= $this->user->gmail ?> </span>
            <?php endif; ?>
          <?php if(!$this->user): ?>
            <li class="nav"><a href="login"><button>Iniciar Sesion</button></a></li>
          <?php else: ?>
            <li class="nav"><a href="logout"><button>Cerrar Sesion</button></a></li>
          <?php endif; ?>
</ul>