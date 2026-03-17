<pre>
login_page.html.twig
        ↓
    login.js
        |-> updateVisibility
        |-> setLanguage
        |       |-> switchLanguage
        |       |-> setText
        |       |       |-> buttonsColor
        |       |       '-> content.js
        |       |
        |       '-----> CustomEvent('lang:change', { detail: lang })
        |                                                       |
        |-> login                                               |_______
        |     |                                                         |
        |     |--> getLoginData ---fetch---> LoginController            |
        |     |                                    |                    |
        |     '--- checkAndRoute <-----JSON--------'                    |
        |               |   |                                           |
        |               |   |-> json.message                            |---> PopupContent.jsx ---> main.jsx
        |               |   '-> errorLoginMessage                       |           |
        |               ↓               |                               |           |-About.jsx <-- about.en.json
        |         MainController        |                               |           |               about.pl.json
        |                               |                               |           |               about.uk.json
        |---> deletePreviousReg <-------'                               |           |-
        |       |↑         ↓                                            |
        |      JSON     deleteMessage                                   |
        |       ↓|                                                      |
        |   DeleteConnectionController                                  |
        |                                                               |
        |                                                               |
        |                                                               |
        '-> initPopup ---> CustomEvent('popup:open', { detail: type })  |
                                                            about       |
                                                            clients     |
                                                            setup       |
                                                            data        |
                                                            run         |
                                                            extras      |
                                                              |_________|

</pre>
