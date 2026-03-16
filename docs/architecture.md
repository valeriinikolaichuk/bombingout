# Architecture Overview
This document describes the **high-level architecture** of the Powerlifting Competition System.

## Level 1 – System Context
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
     ↓                   ↓                   ↓                 ↓                ↓                ↓
SCOREBOARD            LIFTING               DISCS         INFORMATION         TIMER          WEIGHING
 Display               ORDER              SEQUENCE          Display          Display            IN
 (Shows               Display              Display         (Athlete           (Lift           Device
 results,            (Order of            (Order of          info)          countdown,      (manages 
 predict              athlete             plates for                      session start)    weighing in
 results)            attempts)           current/next                                       procedure)
</pre>
### Description of Level 1

Admin Device: main device used by organizers to manage the competition, register participants, create start groups, enter and display live updates, manage pre- and post-competition documentation.

Powerlifting Competition System: backend system + database + real-time messaging.

Client Scenarios / Roles:

Protocol Display: shows current results and predicts session outcomes

Attempts Order: displays the order of athletes’ attempts

Plate Order: shows plate setup order for current and next athlete

Info Board: informational screen showing athlete data to spectators

Timer Display: controls countdown for attempts and session start

Weighing Client: independent device for judges to weigh participants; data goes directly to the system


## Containers / Modules

## High-Level Flow
