<pre>
        login_page.html.twig | redirection_page.html.twig (relogin)
                                    ↓
                                   JSON ---> JS ---> MainController
                                    ↓↑
                             LoginController <--------------------.
                                    ↓                             |
                              LoginFactory            <-----------|
                                    ↓                             |     
                           LoginMethodInterface       <-----------|
                            ________|_________                    |
                                    ↓                             |
LoginContextBuilder <======= LoginMethodDefault <-----------------|
          ↓                         |      |                      |
ContextFillerInterface              |      '======================|=========================> LoginCompleted
 _________↓_________                |                             |                                  ↑
          ↓                         |                             |                                  |
      [ Filler ]                    |                             |                                  |
          ↓                         ↓                             |                                  |
    LoginContext  --------->  StrategyFactory -----------> LoginResultDTO                            |
                                    ↓                                                                ↓
LoginCheckerResolver <-----> StrategyAbstract                                             LoginCompletedInterface 
         |                 _________↓_________                           ____________________________↓____________________________
         |                          ↓                                   ↓↑                           ↓↑                           ↓↑
         |                  LoginStrategyDefault <----.           SaveLoginData                CreateSession                  PageAction
         ↓                          ↓                 |                 ↓↑       LoginResultDTO      ↓↑                            ↑
VerificationInterface       LoginResultBuilder        |        ComputerStatusWriter    ⬑---- SessionFactory <---------------------'
_________↓_________                 ↓                 |                 ↓↑                           ↓   ⬑---- SessionAwareTrait
         ↓                      [ Result ]            |             Connection             SessionActionInterface 
LoginPasswordChecker                ↓                 |                        ______________________↓______________________ 
        ↓↑                    LoginResultDTO          |                       ↓             |               ↓               |
UserRegRepository                                     ↓               SessionActionLogin    ↓    SessionActionParticipant   ↓
        ↓↑                                   LoginPolicyResolver                    SessionActionStatusId              SessionActionPage
     UserReg                                 _________↓_________ 
                                                      ↓
                                          ExistingEnvironmentPolicy ⇄ ComputerStatusReader 
                                                      ↓                         ↓↑
                                                LoginResultDTO              Connection                      

</pre>
