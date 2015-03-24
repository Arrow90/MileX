<?php
/* @var $user app/models/Persona */
?>

<h1>Usuario </h1>

<?php foreach($user as $u): ?>
    <p><?= $u->nombre ?></p>
<?php endforeach; ?>

    <h1>Coches </h1>

<?php foreach($coche as $c): ?>
    <p><?= $c->nombre ?></p>
<?php endforeach; ?>

<h1 id="xixi" >Hola clicka</h1>
<a href="#" data-confirm="papapa"> pulsa</a>

<p class="edit-content">
    Lorem ipsum dolor sit amet, consectetur adipisicing elit.
    Alias commodi debitis dignissimos dolore, fuga, harum molestias natus neque nihil nisi numquam obcaecati provident quisquam sed totam ullam ut vero voluptates.
</p>
