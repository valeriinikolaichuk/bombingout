<pre>
                            MainController
                                ↓
SessionAwareTrait ------> ResolverFactory <------------------------------------------------------------------.
                                ↓                                                                            |
                       PageResolverInterface                                                               array
         _______________________|_________________________ ____________________________                      |
        ↓                       ↓                         ↓                            ↓                     |
LoginPageResolver    RedirectionPageResolver     ParticipantPageResolver         PagesResolver <-- PageEnum  |
        ↓                       ↓                         ↓                            ↓                     |
login_page.html.twig   redirection_page.html.twig   dashboard_page.html.twig   $page.'.html.twig' -----------'
</pre>
