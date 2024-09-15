# User Registration and Default Attributes Assignment

## Overview

When a new user registers in the Galaxion, they are automatically assigned a default spaceship along with 100 starting points.<br> 
This process is handled by an event listener that triggers upon the user registration event.<br>
This functionality ensures that each user starts with a basic spaceship and enough points to begin upgrading or fighting in battles.

## Key Components

- Event Listener: The `UserRegisteredListener` class is responsible for assigning the default spaceship and initial points to the new user. It listens for the UserRegisteredEvent, which is triggered after successful registration.

- Event: The `UserRegisteredEvent` class is dispatched when a new user completes the registration process. It carries information about the newly registered user.

- Registration Controller: The `RegistrationController` handles the user registration process, including password hashing, form submission, and triggering the event once the registration is successful.

## Detailed Process

### 1. User Registration Flow

The registration process is initiated by the `RegistrationController`. It presents a form for the user to fill in their details, including setting a password. When the form is successfully submitted and validated:
- The user’s password is hashed for security purposes.
- The user’s data is persisted in the database using Doctrine’s `EntityManager`.
- After saving the user, an event (`UserRegisteredEvent`) is dispatched, carrying the information about the newly created user.

Registration Form Flow:
1. Form submission: The user fills out the registration form.
2. Validation: Symfony validates the form data.
3. Password hashing: The user’s password is hashed using Symfony’s `UserPasswordHasherInterface`.
4. User creation: The user is saved in the database.
5. Event dispatch: The event `UserRegisteredEvent` is dispatched to indicate the successful registration
```php
$eventDispatcher->dispatch(new UserRegisteredEvent($user), UserRegisteredEvent::NAME);
```

### 2. Assigning Default Spaceship and Points

Once the UserRegisteredEvent is dispatched, the `UserRegisteredListener` listens for this event. The `assignDefaultAttributesToUser` method is then triggered, performing the following actions:
1. Retrieve the user: The user object is retrieved from the event.
2. Find default spaceship: The listener queries the database for the default spaceship, identified by a constant value stored in the `SpaceshipNamesConst` class.
3. Create user spaceship: A new `UserSpaceship` entity is created, linking the user to the default spaceship and setting the starting points to 100.
4. Persist changes: The new `UserSpaceship` entity is saved to the database, effectively completing the process of assigning default attributes to the user.

Key Points:
- The default spaceship is fetched using the SpaceshipRepository.
- The user starts with 100 points, defined as a constant in the listener.
```php
$userSpaceship
    ->setUser($user)
    ->setSpaceship($defaultSpaceship)
    ->setAvailablePoints(self::DEFAULT_STARTING_POINTS);
```
Default Spaceship and Points Assignment Flow:
1. User registered: The user is successfully registered in the system.
2. Default spaceship assigned: The system assigns a default spaceship using the `SpaceshipRepository`.
3. Starting points set: The user is given 100 starting points.
4. Changes persisted: The new user spaceship configuration is saved in the database.

## Service Configuration

The listener is registered as a service in `services.yaml` and tagged to listen for the `user.registered` event.
```yaml
App\EventListener\UserRegisteredListener:
    tags:
        - { name: 'kernel.event_listener', event: 'user.registered', method: 'assignDefaultAttributesToUser' }

```