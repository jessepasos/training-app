# Datanerds Training App 

Datanerds uses the Laravel framework for most of our applications. This training process is designed to get you up to speed on this framework, our style of building apps, and version control.

Complete each of these challenges in order. When you need help, please consult the laravel documentation, the literature we have available, and Laracasts. If you are still stuck, we’d be happy to help you. Don’t try to be fancy and get too deep on any one of these tasks, the point is to develop and show you have a clear understanding of the fundamentals.

For these challenges, you will only need to use the routes file, Controllers folder, Models folder, database migrations folder, and views folder.

## Software you need:

- phpStorm/Sublime text
- Homestead (https://laravel.com/docs/5.3/homestead)
- SequelPro

Our instructions assume you are using these tools. 

## Install the app locally:
`Note: the steps to set up the application within homestead are located within the Laravel documentation`

1. Fork the repository located at https://github.com/datanerdscom/training-app
2. Install the composer dependencies
3. Migrate and seed the database using php artisan migrate --seed
4. Configure the .env file to point to the new database
5. Navigate to training-app.dev:8000 in your favorite web browser and get ready to start playing
6. Click on "Continue" to register yourself as a new user of the app

## Challenge 1: Gather the crew
`Edit basic routing, request handling, edit a view, eloquent interaction`

Captain Blackbird has assembled a crew and ‘acquired’ a ship called the Black PERL. The Black PERL’s home base is Port Royal. He needs to assign every member of his crew to a role on the ship.

Go to the pirate ship roster page. You’ll see a list of the crew. Click on the edit icon next to any crew member. This takes you to their detail page where you will see their basic information. 

Add in a field to the crew detail page called “Crew rank”. The options for this field will be a drop down list:
- Captain
- First mate
- Boatswain
- Second mate
- Sergeant-at-arms
- Seaman
- Cook

You will need to add this option into the view, the controller, and the model. 

> Objective: Once you’ve completed this task, a user should be able to edit any crew member and change their rank.

## Challenge 2: Survey the sea
` Create new route, create new controller, create new migration, create new view.`

We need a list of ports to attack. Make a page that lists 10 different ports to attack (you can pick the names of the ports). Make a button for each row that says “Attack”. We’ll use that later.

You’ll need to create a table and seed it with a migration. You will need to create a new view and route for the ports page. Each port record should have these fields:
- name
- attacked_at (date field)
- treasure_amount (integer field)

All these fields should show on the list page.

> Objective: Once you’ve completed this task, a user should be able to navigate to a list and see all the ports we can attack.

## Challenge 3: A-plundering we go
`Create new route, create methods, work with multiple models.`

The Black PERL is leaving port. We need to attack someone. 

Create routes for attacks on neighbouring ports. This url should be created: training-app.dev:8000/app/attack?port=Jamaica Bay

Link the “attack” button on the ports list with the correct url.

When you append the name of the port to this url we need the database to update the port that was attacked with attacked_at = current date and time.. The value of the treasure in the port’s record needs to be reduced to zero and those funds added to the Black PERL’s funds.

> Objective: Once you’ve completed this task, a user should be able to attack any port and steal their treasure.

## Challenge 4: The fleet grows
`Create new route, new view, edit methods, access control.`

Our pirates have had a successful raiding season. We have captured two ships, and now we need to keep track of them. 

Create a list view for the ships in our pirate fleet, and an edit page. You should be edit any of the properties of the ship:

- Captain (this will be an id that can pull in the crew_id from the crew table)
- Displacement
- Length
- Draft
- Saltiness of the crew
- Number of cannons (0-10)

That should be easy by now. Here’s where it gets interesting. You need to create a different level of access for Admiral Blackbird to be able to order the ships to perform any of these actions:

- Assign/Move crew between ships
- Send a ship back to homeport
- Send a ship to attack a port
- Rename a ship
- Transfer the treasure from any ship to Port Royal


> Objective: Once you’ve completed this task, a user should be view or edit any of the properties of a ship. An administrator will be able to order the ships to perform a number of actions, but a regular user will not.



## Challenge 5: 17th century game theory
`Advanced routing, service development.`

Let’s make this a little more fun. The ports are sick and tired of being raided, and they have built up some defences.

Make these changes:

1. The treasure in a port replenishes as time increases since the last raid. The port treasury adds one piece of gold for every 15 seconds since the last raid. 
2. When a ship attacks, there is now an algorithm to follow to determine whether the raid succeeds or not:
   1. Take the number of cannons of the ship and subtract the defensive rating of the port (you’ll need to add a migration to UPDATE the port table with a defensive_rating field of 0-10). This number cannot go below one.
   2. This number represents the number of chances the ship gets to raid the port. Each attack has a 50/50 chance of winning. 
   3. For every unsuccessful raid, the ship accrues 20% damage. Once the ship reaches 100%, it sinks and is lost forever. For every successful raid, the ship acquires half the original treasure.
   4. The ship can be repaired at the cost of 1 piece of gold for 10% damage. Any user can pay for a repair.
3. Ships can only hold 200 pieces of gold before they have to transfer them to Port Royal. Make sure this happens otherwise they sink!

Set up a process to run through these attacks programmatically until either the whole fleet sinks or our plucky pirates have stripped every port of it’s last piece of eight.

> Objective: Make a dull training exercise fun.


## Challenge 6: Be creative

Come up with another modification to this app of your own. The best part about being a pirate is having no rules. Extend the game functionality in a fun way. Feel free to use APIs, other 
