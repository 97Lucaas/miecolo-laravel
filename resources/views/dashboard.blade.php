<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>

    <form action="{{ route('update-value') }}" method="POST">
        @csrf
        <x-primary-button class="ml-3">
            {{ __('Increment') }}
        </x-primary-button>
    </form>

    <table class="max-w-7xl mx-auto sm:px-6 lg:px-8">
		<thead>
			<tr>
				<th>Pseudo</th>
				<th>Score</th>
			</tr>
		</thead>


		<tbody id="tbodylb">






        <script>

            function readJSON(data){
            // readJSON = data => {
            // get values of (key) idbalise
            console.log("full output=", data); // [Object,Object,Object] retourne un tableau des données ci-dessous
            console.log("all=");
            console.log(data[0].original); // retourne toutes les lignes de la base de données
            console.log("myline=");
            console.log(data[1].original); // retourne seulement la ligne du joueur connecté
            console.log("id=" + data[2]); // retourne l'identifiant du joueur connecté

            var alldatas = data[0].original;

            alldatas.forEach(function(o) {
                document.getElementById("tbodylb").innerHTML += "<tr> <td>"+o.name+"</td> <td>"+o.score+"</td> </tr>";
            });
            }
//bullshit

            /*
            fetch('/Increment',{
                    method:'POST',
                    headers:{
                        "X-CSRF-Token": "{{ csrf_token() }}",
                        'Content-Type':'application/json'
                    }
                })
                .then((reponse) => {console.log("reponse",reponse.json());});
            */
            

            $.ajax({ //jQuery
            url: '/Increment', //requete en ajax grace a jQuery, on se rend sur la page /Increment
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'), //avec le jeton de sécurité de forumlaire généré par laravel
                'Content-Type':'application/json' //on attend du json
            },
            method: 'POST', //en post
            dataType: 'json', //on attend du json
            }).done(function(data) {
                //console.log(data);
                readJSON(data); //on appelle la fonction readJSON pour mettre tout ça en forme
            }); 

        </script>

			<!-- Ajoutez d'autres lignes pour plus de scores -->
		</tbody>
	</table>

</x-app-layout>