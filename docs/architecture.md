# Architecture Overview
This document describes the **high-level architecture** of the Powerlifting Competition System.

## Level 1 – System Context
This high-level diagram shows the **main actors and the system**, and the core scenarios supported by the Powerlifting Competition System.  
It does not include implementation details, only the roles and how they interact with the system.

               Admin Device
 (manages competitions, registrations,
  start groups, session updates,
  pre- and post-competition documentation)
                     |
                     v
       +--------------------------------+
       | Powerlifting Competition System |
       +--------------------------------+
                     |
  ------------------------------------------------------
  |          |           |            |               |
  v          v           v            v               v
Protocol   Attempts   Plate Order   Info Board       Timer
Display   Order       Display      (Athlete info)  Display
(Shows     (Order of   (Order of                     (Lift countdown,
results,   athlete     plates for                     session start)
predict    attempts)   current/next
session)


## Containers / Modules

## High-Level Flow
