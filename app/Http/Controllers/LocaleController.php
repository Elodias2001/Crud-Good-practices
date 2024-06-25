<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;

class LocaleController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(string $locale): RedirectResponse // Un controller invokable c-a-d il n'a qu'une seule méthode
    {
        return back()->withCookie(cookie()->forever('locale', $locale));

        //RAPPEL  : Un cookie c'est une info qui va s'enrégistrer sur la machine de l'utilisateur et qui sera ensuite envoyé dans les headers sur le serveur, php va le lire sous cookies
        // En gros c'est quelque chose qui sur la machine de votre utilisateur et php serait en mesure de le lire quand la requete arrivera
        //Donc là on a retourner uen redirection avec la création d'un cookie et
    }
}
