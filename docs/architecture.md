# Architecture Overview
This document describes the **high-level architecture** of the Powerlifting Competition System.

## Level 1 – System Context
The system allows configuring multiple computers for different roles during a powerlifting competition.  
Each device connects to the same system and selects a **scenario** that defines its behavior.  
This high-level diagram shows the **main actors and the system**, and the core scenarios supported by the Powerlifting Competition System.  
It does not include implementation details, only the roles and how they interact with the system.

<pre>
                                                  ADMIN Device
                                   (manages competitions, registrations,
                                        start groups, session updates,
                                   pre- and post-competition documentation)
                                                      ↓
                                     +---------------------------------+
                                     | Powerlifting Competition System |
                                     +---------------------------------+
                                                      ↓
     ---------------------------------------------------------------------------------------------
     ↓                   ↓                    ↓                ↓                ↓                ↓
SCOREBOARD            LIFTING               DISCS         INFORMATION         TIMER           WEIGHING
 Display               ORDER               SEQUENCE         Display          Display             IN
 (Shows               Display              Display         (Athlete           (Lift            Device
 results,            (Order of            (Order of          info)          countdown,        (manages 
 predict              athlete             plates for                      session start)      weighing in
 results)            attempts)           current/next                                         procedure)
</pre>

### Description of Level 1

### Admin Device: 
main device used by organizers to manage the competition, register participants, create start groups, enter and display live updates, manage pre- and post-competition documentation.

Powerlifting Competition System: backend system + database + real-time messaging.

### Client Scenarios / Roles:
- SCOREBOARD Display: shows current results and predicts session outcomes
- LIFTING ORDER Display: displays the order of athletes’ attempts
- DISCS SEQUENCE Display: shows plate setup order for current and next athlete
- INFORMATION Display: informational screen showing athlete data to spectators
- TIMER Display: controls countdown for attempts and session start
- WEIGHING IN Client: independent device for judges to weigh participants; data goes directly to the system

#### Notes: 
- This diagram represents Level 1 of C4 model (System Context)
- No controllers, classes, or database details are shown
- Purpose: give a high-level overview of the system and its interactions

## Level 2 - Containers / Modules

### Page Resolution Module
Responsible for determining which page scenario should be loaded
for the current device.
|Component / Template| Responsibility / Scenario|
|----------|-----------|
|MainController|Handles page rendering and coordinates scenario selection|
|SessionAwareTrait|Manages session start and session-related context|
|ResolverFactory|Instantiates the appropriate PageResolver based on the scenario|
|PageResolverInterface|Contract for resolving pages according to scenario|
|login_page.html.twig|Entry point / Template for login page|
|redirection_page.html.twig|Template for scenario selection / redirection page|
|dashboard_page.html.twig|Template for participant / registration page|
|$page.'.html.twig'|Generic page template dynamically resolved by PagesResolver|
|PageEnum|Enum defining all possible admin/client page scenarios (Admin, Scoreboard, Timer…)|  

➡ [Page Resolution Module](mjdules/page_resolution_module.md)

## Level 3 - High-Level Flow
<pre>               User opens website
                       ↓
                 Landing page
              (information + login)
                       ↓
                Authentication
                       ↓
              Scenario selection page
                       ↓
             User selects device role
                       ↓
        System loads corresponding interface</pre>
