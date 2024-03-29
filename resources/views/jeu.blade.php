<x-app-layout> 
    <section class="jeu">
        <section class="menuWrapper">
            <section class="menu_game">
                <section class="explication_game">
                <h2>Le juste Poids</h2>
                Tentez de remporter une balance principale connectée en jouant au juste poids. Le but ? Trouver le poids de la ruche le plus rapidement possible. Pour cela, placez les différents pots de miel de l’autre côté de la balance pour trouver le juste équilibre.
                <br/>
                <br/>
Alors ? Vous pensez pouvoir faire mieux que notre balance ?                </section>
                <button class="button_game"onclick="startGame()"> Tenter ma chance </button>
            </section>
        </section>
        <section class="menuWrapperFin">
            <section class="menuFin">
                <section class="explicationFin">
                    Bravo, vous avez deviné que la balance pesait   en   secondes !
                </section>
                <button onclick="reload()"> Rejouer </button>
            </section>
        </section>
    </section>

</x-app-layout>

<!-- Script JS DU JEU FAIT PAR FRANCIA ET AIDÉ PAR CAMILLE -->
<script>
    
// Initialisation Matter.js

var Engine = Matter.Engine,
    Render = Matter.Render,
    Runner = Matter.Runner,
    Body = Matter.Body,
    Bodies = Matter.Bodies,
    Composite = Matter.Composite,
    Composites = Matter.Composites,
    Constraint = Matter.Constraint,
    MouseConstraint = Matter.MouseConstraint,
    Mouse = Matter.Mouse,
    Vector = Matter.Vector;

// Creation de engine
var engine = Engine.create(),
    world = engine.world;

// Creation de renderer
var render = Render.create({
    element: document.querySelector(".jeu"),
    engine: engine,
    options: { 
        width: window.innerWidth,
        background: '#BFDFF0',
        height: 600, 
        wireframes: false,       // False pour afficher les textures
    }
});

Render.run(render);

// create runner
var runner = Runner.create();
Runner.run(runner, engine);

// Masks
var defaultMask = 1
var clickableMask = 2
var collisionMask = 3
var ignoreMask = 8
var herbeMask = 16

// Intervalle du poids de la ruche
var weight = randomIntFromInterval(17, 40)

// console.log(weight)

// Plateau principal de la balance
var xPlateau = 380;
var yPlateau = 520;
var wPlateau = 400;
var hPlateau = 20;
var plateau = Bodies.rectangle(xPlateau, yPlateau, wPlateau, hPlateau, { collisionFilter: { mask: ignoreMask }, render: { fillStyle: '#00ff00', sprite: {
    texture: '{{ asset("assets/img/jeu/balance1.png") }}',
    xScale: 0.8,
    yScale: 0.8
  } } })

// Composant des deux plateaux de la balance
var wSquare = 200;
var hSquare = 10;
var xOffSeteL = -wPlateau / 2 + wSquare / 2;
var xOffSeteR = +wPlateau / 2 - wSquare / 2;
var yOffSet = -hPlateau / 2 - hSquare / 2;

var edgeLeft = Bodies.rectangle(xPlateau + xOffSeteL, yPlateau + yOffSet, wSquare, hSquare, { collisionFilter: { mask: clickableMask }, render: {sprite: {
    texture: '{{ asset("assets/img/jeu/plateau.png") }}',
    xScale: 1,
    yScale: 1
  }}}); // bord gauche de la balance
var edgeRight = Bodies.rectangle(xPlateau + xOffSeteR, yPlateau + yOffSet, wSquare, hSquare, { collisionFilter: { mask: clickableMask }, render: {sprite: {
    texture: '{{ asset("assets/img/jeu/plateau.png") }}',
    xScale: 1,
    yScale: 1
  }}} ); // bord droit de la balance

  // Bordure des bords de la balance
  var edgeELeft = Bodies.rectangle(xPlateau + xOffSeteR, yPlateau + yOffSet, 10, 45, {mass: 0, collisionFilter: { mask: clickableMask }, render: {fillStyle: 'transparent'}}); // bord gauche de la balance
  var edgeRLeft = Bodies.rectangle(xPlateau + xOffSeteL, yPlateau + yOffSet, 10, 45, {mass: 0, collisionFilter: { mask: clickableMask }, render: {fillStyle: 'transparent'}}); // bord droit de la balance
  var edgeERight = Bodies.rectangle(xPlateau + xOffSeteL, yPlateau + yOffSet, 10, 45, {mass: 0, collisionFilter: { mask: clickableMask }, render:{fillStyle: 'transparent'}} ); // bord gauche de la balance
  var edgeRRight = Bodies.rectangle(xPlateau + xOffSeteL, yPlateau + yOffSet, 10, 45, {mass: 0, collisionFilter: { mask: clickableMask }, render:{fillStyle: 'transparent'}} ); // bord droit de la balance


// Sol
var ground = Bodies.rectangle(window.innerWidth / 2, 600, window.innerWidth, 50.5, { collisionFilter: { category: collisionMask }, isStatic: true, render: { fillStyle: '#86C6B5', opacity: 1 } });

// Déclaration de variables pour le jeu
let millisStart; 
let milliEnd;
let score = 0;
let asWon = false;

// Déclaration des poids

// var poids1 = Bodies.rectangle(window.innerWidth - 50, 50, 20, 25, { mass: 0.5, collisionFilter: { category: collisionMask | clickableMask }, render: { sprite: {
//     texture: '{{ asset("assets/img/jeu/pot0_5.svg") }}',
//     xScale: 0.25,
//     yScale: 0.25
//   }}}); 
// Poids trop faible donc qui n'influe pas sur la balance 

// 1kg
var poids2 = Bodies.rectangle(window.innerWidth - 50, 150, 30, 35, { mass: 1, collisionFilter: { category: collisionMask | clickableMask }, render: { sprite: {
    texture: '{{ asset("assets/img/jeu/pot1.svg") }}',
    xScale: 0.28,
    yScale: 0.28
  } } }); 

// 2kg
var poids3 = Bodies.rectangle(window.innerWidth - 50, 250, 40, 40, { mass: 2, collisionFilter: { category: collisionMask | clickableMask }, render: {sprite: {
    texture: '{{ asset("assets/img/jeu/pot2.svg") }}',
    xScale: 0.30,
    yScale: 0.30
  } } }); 

// 5kg
var poids4 = Bodies.rectangle(window.innerWidth - 50, 350, 50, 50, { mass: 5, collisionFilter: { category: collisionMask | clickableMask }, render: { sprite: {
    texture: '{{ asset("assets/img/jeu/pot5.svg") }}',
    xScale: 0.35,
    yScale: 0.35
  } } }); 

// 10kg
var poids5 = Bodies.rectangle(window.innerWidth - 50, 450, 60, 60, { mass: 10, collisionFilter: { category: collisionMask | clickableMask }, render: { sprite: {
    texture: '{{ asset("assets/img/jeu/pot10.svg") }}',
    xScale: 0.38,
    yScale: 0.38
  }}}); 


// Support des poids 

//var etagere1 = Bodies.rectangle(window.innerWidth - 50, 100, 100, 10, { isStatic: true, collisionFilter: { category: collisionMask }, render: { fillStyle: 'transparent' } }); 
var etagere2 = Bodies.rectangle(window.innerWidth - 50, 190, 100, 10, { isStatic: true, collisionFilter: { category: collisionMask }, render: { fillStyle: 'transparent' } }); 
var etagere3 = Bodies.rectangle(window.innerWidth - 50, 290, 100, 10, { isStatic: true, collisionFilter: { category: collisionMask }, render: { fillStyle: 'transparent' } }); 
var etagere4 = Bodies.rectangle(window.innerWidth - 50, 390, 100, 10, { isStatic: true, collisionFilter: { category: collisionMask }, render: { fillStyle: 'transparent' } }); 
var etagere5 = Bodies.rectangle(window.innerWidth - 50, 500, 100, 10, { isStatic: true, collisionFilter: { category: collisionMask }, render: { fillStyle: 'transparent' } }); 

// Décoration 
var herbe = Bodies.rectangle(860, 545, 100, 70, { isStatic: true, collisionFilter: { category: herbeMask }, render: { sprite: {
    texture: '{{ asset("assets/img/jeu/herbe.png") }}',
    xScale: 0.50,
    yScale: 0.50
  }}});

// Ruche avec un poids aléatoire 

var ruche = Bodies.rectangle(xPlateau, yPlateau-200, 150, 150, { mass: weight, collisionFilter: { category: collisionMask, mask: collisionMask}, render: { sprite: {
    texture: '{{ asset("assets/img/jeu/ruche.png") }}',
    xScale: 0.50,
    yScale: 0.40
  }}});

Composite.add(world, [
    ground,
    herbe,
    plateau,
    edgeLeft,
    edgeELeft,
    edgeRLeft,
    edgeERight,
    edgeRRight,
    edgeRight,

    // poids1,
    poids2,
    poids3,
    poids4,
    poids5,

    // etagere1,
    etagere2,
    etagere3,
    etagere4,
    etagere5,

    ruche,

    // poteaux central
    Bodies.rectangle(xPlateau, 300, 20, 600, { isStatic: true, collisionFilter: { mask: collisionMask }, render: {sprite: {
        texture: '{{ asset("assets/img/jeu/balance2.png") }}',
        xScale: 1,
        yScale: 1
      } } }),


    // Initialisation contrainte

    Constraint.create({
        bodyA: plateau, // sur quoi porte la contrainte
        pointB: Vector.clone(plateau.position), //le point d'encrage (xCentre, yCentre)
        stiffness: .2, // raideur elasticité max 2 décroché min  
        length: 0 // disrtance entre le point d'encrage et le centre de gravité
    }),
    // assemblage des bords de la balance avec son plateau
    Constraint.create({
        bodyB: plateau, // sur quoi porte la contrainte
        pointB: { x: xOffSeteL - 50, y: 0 },
        bodyA: edgeLeft,
        stiffness: 0, // raideur elasticité max 2 décroché min  
        length: 0 // disrtance entre le point d'encrage et le centre de gravité
    }),
    // assemblage des bords de la balance avec son plateau
    Constraint.create({
        bodyB: plateau, // sur quoi porte la contrainte
        pointB: { x: xOffSeteR + 50, y: 0 },
        bodyA: edgeRight,
        stiffness: 0, // raideur elasticité max 2 décroché min  
        length: 0 // disrtance entre le point d'encrage et le centre de gravité
    }),

    Constraint.create({
        bodyB: edgeRight, // sur quoi porte la contrainte
        pointB: { x: xOffSeteR +15, y: yOffSet },
        bodyA: edgeELeft,
        stiffness: 1, // raideur elasticité max 2 décroché min  
        length: 0, // disrtance entre le point d'encrage et le centre de gravité
        mass:0
    }),

    Constraint.create({
        bodyB: edgeRight, // sur quoi porte la contrainte
        pointB: { x: xOffSeteL -15, y: yOffSet },
        bodyA: edgeERight,
        stiffness: 1, // raideur elasticité max 2 décroché min  
        length: 0, // disrtance entre le point d'encrage et le centre de gravité
        mass:0
    }),

    Constraint.create({
        bodyB: edgeLeft, // sur quoi porte la contrainte
        pointB: { x: xOffSeteR +15, y: yOffSet },
        bodyA: edgeRLeft, // objet avec la contraite
        stiffness: 1, // raideur elasticité max 2 décroché min  
        length: 0, // disrtance entre le point d'encrage et le centre de gravité
        mass:0
    }),

    Constraint.create({
        bodyB: edgeLeft, // sur quoi porte la contrainte
        pointB: { x: xOffSeteL -15, y: yOffSet },
        bodyA: edgeRRight,
        stiffness: 1, // raideur elasticité max 2 décroché min  
        length: 0, // disrtance entre le point d'encrage et le centre de gravité
        mass:0
    })

]);

// add mouse control
var mouse = Mouse.create(render.canvas),
    mouseConstraint = MouseConstraint.create(engine, {
        mouse: mouse,
        constraint: {
            collisionFilter: { category: clickableMask},
            stiffness: .2, // 0 les objets deviennent insaissiables
            render: {
                visible: false
            }
        }
    });

Composite.add(world, mouseConstraint);

render.mouse = mouse;

// Fonction animate 
Animate();

function Animate() {

    //Position de la ruche
    Matter.Body.setPosition(ruche, Matter.Vector.create(xPlateau + xOffSeteL*1.45, ruche.position.y))

    // Mis à jour du score dans la fonction animate
    if (plateau.angle < -0.02) {
        Matter.Body.setAngle(plateau, plateau.angle + 0.01)

    } else if (plateau.angle > 0.02) {
        Matter.Body.setAngle(plateau, plateau.angle - 0.01)
    }

    // Set de l'inertie des composants

    Matter.Body.setInertia(edgeLeft, Infinity)
    Matter.Body.setInertia(edgeELeft, Infinity)
    Matter.Body.setInertia(edgeERight, Infinity)
    Matter.Body.setInertia(edgeRLeft, Infinity)
    Matter.Body.setInertia(edgeRRight, Infinity)
    Matter.Body.setInertia(edgeRight, Infinity)
    Matter.Body.setInertia(ruche, Infinity)

    // Verification du mouvement des plateaux

    Matter.Body.setAngularVelocity(edgeLeft, 0)
    Matter.Body.setAngularVelocity(edgeRight, 0)

    // Génération de poids

    // if (poids1.position.x < window.innerWidth - 100) {
    //     Composite.add(world, [
    //         poids1 = Bodies.rectangle(window.innerWidth - 50, 50, 10, 10, { mass: 0.5, collisionFilter: { category: collisionMask | clickableMask }, render: { sprite: {
    //             texture: '{{ asset("assets/img/jeu/pot0_5.svg'") }},
    //             xScale: 0.25,
    //             yScale: 0.25
    //           } } })
    //     ])
    // }

    if (poids2.position.x < window.innerWidth - 100) {
        Composite.add(world, [
            poids2 = Bodies.rectangle(window.innerWidth - 50, 150, 20, 20, { mass: 1, collisionFilter: { category: collisionMask | clickableMask }, render: { sprite: {
                texture: '{{ asset("assets/img/jeu/pot1.svg") }}',
                xScale: 0.28,
                yScale: 0.28
              } }})
        ])
    }

    if (poids3.position.x < window.innerWidth - 100) {
        Composite.add(world, [
            poids3 = Bodies.rectangle(window.innerWidth - 50, 250, 30, 30, { mass: 2, collisionFilter: { category: collisionMask | clickableMask },  render: { sprite: {
                texture: '{{ asset("assets/img/jeu/pot2.svg") }}',
                xScale: 0.3,
                yScale: 0.3
              } }})
        ])
    }

    if (poids4.position.x < window.innerWidth - 100) {
        Composite.add(world, [
            poids4 = Bodies.rectangle(window.innerWidth - 50, 350, 40, 40, { mass: 5, collisionFilter: { category: collisionMask | clickableMask },  render: { sprite: {
                texture: '{{ asset("assets/img/jeu/pot5.svg") }}',
                xScale: 0.35,
                yScale: 0.35
              } }})
        ])
    }
    if (poids5.position.x < window.innerWidth - 100) {
        Composite.add(world, [
            poids5 = Bodies.rectangle(window.innerWidth - 50, 450, 50, 50, { mass: 10, collisionFilter: { category: collisionMask | clickableMask },  render: { sprite: {
                texture: '{{ asset("assets/img/jeu/pot10.svg") }}',
                xScale: 0.38,
                yScale: 0.38
              } }})
        ])
    }

    //Appel de la fonction pour la mis à jour du score
    majScore();

    // Exécution de l'animation
    window.requestAnimationFrame(Animate);

}

// Nombre aléatoire pour le poids de la ruche 
function randomIntFromInterval(min, max) { 
    return Math.floor(Math.random() * (max - min + 1) + min)
}

// Mis à jour du score dans la fonction animate
function majScore() {
    if (-0.02 < plateau.angle && plateau.angle < 0.02) {

        setTimeout(() => {
            if (-0.02 < plateau.angle && plateau.angle < 0.02) {
                if (!asWon) {
                    endGame();
                }
            }
        }, 1000);
    }
}

// Fonction début du jeu pour mettre un flou et démararrer le timer au clic
function startGame() {
    let menu = document.querySelector(".menuWrapper")
    let canvas = document.querySelector("canvas")

    menu.style.opacity = 0
    menu.style.pointerEvents = "none"
    canvas.style.filter = "blur(0)"
    canvas.style.pointerEvents = "unset"

    startTimer();
}

// Start du timer 
function startTimer() {
    millisStart = Date.now();
}

// Fonction fin du jeu pour remettre le flou et afficher le temps

function endGame() {
    let menuFin = document.querySelector(".menuWrapperFin")
    let expliFin = document.querySelector(".explicationFin")

    let canvas = document.querySelector("canvas")


    asWon = true;
    milliEnd = Date.now() - millisStart;
    console.log("seconds elapsed = " + milliEnd / 1000);


    menuFin.style.opacity = 1
    menuFin.style.pointerEvents = "unset"

    canvas.style.filter = "blur(100px)"
    canvas.style.pointerEvents = "none"

    expliFin.innerHTML = "Bravo, vous avez deviné que la balance pesait " + weight + "kg en " + milliEnd / 1000 + " secondes ! Avec les balances connectées Miecolo, c'est instantané ;)"
}

// Refresh de la page
function reload() {
    window.location.reload();
}

</script>