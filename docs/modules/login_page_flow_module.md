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
        |               |   |-> json.message                            |
        |               |   '-> errorLoginMessage                       |
        |               ↓               |                               |
        |         MainController        |                               |
        |                               |                               |
        |---> deletePreviousReg <-------'                               |
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
                     _________________________________________|_________|
                    ↓
main.jsx <--- PopupContent.jsx
                    |
                    |-About.jsx <-- about.en.json
                    |               about.pl.json
                    |               about.uk.json
                    |-
</pre>
