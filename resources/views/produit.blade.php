<x-app-layout> 




<div class="fond">
    <img class="fond_gri" src="../assets/img/appel jeu concours.png">
    <h1 class="juste_choix">Le <i>juste</i> choix<p class="blanc_sous_titre">(sans vouloir nous jeter des fleurs...)</p></h1>
    <img src="../assets/img/Group 100.png" class="z">
    <img src="../assets/img/Group 119.png" class="z_2">
<section class="concours">
    <section class="concours-wrapper">
        <p>Clic, clic, clic, vous êtes juste </p>
        <h2>à un clic de gagner votre balance.</h2>
        <p>À défaut de gagner au loto, tentez de remporter une de nos <br> balance connectées en trouvant le juste
            poids...
        </p>

        <button class="concours-button"> <a href="{{ url('jeu') }}">Jouer</a></button>
    </section>
    <section class="concours-wrapper-back">
        <p>Clic, clic, clic, vous êtes juste </p>
        <h2>à un clic de gagner votre balance.</h2>
        <p>À défaut de gagner au loto, tentez de remporter une de nos <br> balance connectées en trouvant le juste
            poids...
        </p>
        <button class="concours-button"> <a href="{{ url('jeu') }}">Jouer</a></button>
    </section>
</section>
</div>

<section>
    <div class="flex_tout">
    
    <section class="flex_img ">
        <img  class="bottom-prd"src="../assets/img/Rectangle 45.png" alt="">
        <p class="prix"> à partir de 265€ TTC</p>
    <div class="flex_quant">
        <img class="plus" src="../assets/img/-.png"> 
        <p class="le_p">  Quantité : <span>0</span> </p> 
        <img class="moins" src="../assets/img/--1.png">
    </div>
        <input class="submit-produit" type="submit" value="Ajouter au panier" class="butt_panier">
    </section>
    
    <div class="flex_txt_case">
        <h1>Balance principale 
            connectée</h1>
    <p class="position_txt">
        Mesure le poids, la température et l’humidité !
    </br>
    </br>
        Contrôlez vos ruches à distance, pour en savoir plus sur l'activité de vos abeilles.
        Gardez l'esprit tranquille, Miecolo vous alerte si des anomalies sont détectées.
        Pas besoin de la recharger vous-même, votre balance est en autonomie énergétique grâce au panneau solaire.
        Facilitez-vous la transhumance, nos balances sont légères, elles ont un poids inférieur à 2 kg !
    </br>
    </br>
        Pour connecter votre balance principale aux réseaux, un abonnement de 3€ TTC/mois est nécessaire.
        </p>
        <input class="submit-voir" type="submit" value="Voir la fiche technique" class="butt_tech">
    </div>
</div>
</section>

<section>
    <div class="flex_tout">
    
    <section class="flex_img ">
        <img class="z_encore" src="../assets/img/Group 138.png" alt="">
        <p class="prix"> à partir de 265€ TTC</p>
    <div class="flex_quant_2">
        <img class="plus" id="plus" style="pointer-events: all;" onclick="Plus()" src="../assets/img/-.png">
        <p class="le_p">  Quantité : <span id="count">0</span> </p> 
        <img class="moins" id="moins" style="pointer-events: all;" onclick="Moins()" src="../assets/img/--1.png">
    </div>
        <input class="submit-produit" type="submit" value="Ajouter au panier" class="butt_panier">
    </section>
    
    <div class="flex_txt_case">
        <h1>Balance principale 
            connectée</h1>
    <p class="position_txt">
        Mesure le poids, la température et l’humidité !
    </br>
    </br>
        Contrôlez vos ruches à distance, pour en savoir plus sur l'activité de vos abeilles.
        Gardez l'esprit tranquille, Miecolo vous alerte si des anomalies sont détectées.
        Pas besoin de la recharger vous-même, votre balance est en autonomie énergétique grâce au panneau solaire.
        Facilitez-vous la transhumance, nos balances sont légères, elles ont un poids inférieur à 2 kg !
    </br>
    </br>
        Pour connecter votre balance principale aux réseaux, un abonnement de 3€ TTC/mois est nécessaire.
        </p>
        <input class="submit-voir_2" type="submit" value="Voir la fiche technique" class="butt_tech">
    </div>
</div>
</section>

</x-app-layout> 