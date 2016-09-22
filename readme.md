# Data Nerds Training App 

Datanerds uses the Laravel framework for most of our applications. This training process is designed to get you up to speed on this framework, our style of building apps, and version control.

Complete each of these challenges in order. When you need help, please consult the laravel documentation, the literature we have available, and Laracasts. If you are still stuck, we’d be happy to help you. Don’t try to be fancy and get too deep on any one of these tasks, the point is to develop and show you have a clear understanding of the fundamentals.

For these challenges, you will only need to use the routes file, Controllers folder, Models folder, database migrations folder, and views folder.

## Software you need:

- phpStorm/Sublime text
- Homestead (https://laravel.com/docs/5.3/homestead)
- SequelPro

## Builders:

If you are completing this as part of an INTERVIEW with Datanerds, please only go as far as the end of challenge 4. 

If you are doing this as part of your training, keep going through to the end.

If you are doing this for fun or as part of the LaraPirate game community and make something cool, please hit us with a pull request. Also, you're awesome, you scurvy dog you.

## Install the app locally:
`Note: the steps to set up the application within homestead are located within the Laravel documentation`

1. Fork the repository located at https://github.com/datanerdscom/training-app
2. Install the composer dependencies
3. Migrate and seed the database using php artisan migrate --seed
4. Configure the .env file to point to the new database
5. Navigate to training-app.dev:8000 in your favorite web browser and get ready to start playing
6. Click on "Continue" to register yourself as a new user of the app

## Challenge 1: Commandeer a ship, and gather the crew
`Edit basic routing, request handling, edit a view, eloquent interaction`

Immediately after registration, the user should be presented with a page where they are instructed to commandeer a ship, the Black Perl. 

In order to build this functionality, you need to register a new route, `/commandeer` which accepts a POST request. This route should point to a new method on the `ShipController`, where you will save the ship for this user.

Within the view, edit the form to send a post request to the route. The form also includes a hidden field with the ship name. This data will be sent back to the route, where you can pick up on it via the Request object and save it in the database. It should then return a redirect response to the `/home` route.

On the homepage, the user should now see their new ship as well as some other information about their port. The next step is to build the functionality to add pirates to the new ship.

Under the section titled "Your Pirates", you should see a link that says "It looks like you need a crew" which opens a popup modal window with a form to add a pirate. Add the following options to the rank drop down list:
- Captain
- First mate
- Second mate
- Sergeant-at-arms
- Seaman
- Cook

You will need to register a new route to accept the posted form to create a pirate, and create new methods on the `PirateController` to save each pirate.

Next, create the following pirates:

- Captain Blackbird
- First Mate Jaybird
- Second Mate Thunderbird
- Sergeant-at-arms Firebird
- Seaman Raven
- Cook Bigbird

> Objective: Once you’ve completed this task, a newly registered user should have one new ship, and a full roster of pirates.

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
`Create new route, new view, edit methods, access control. Create a trait`

Our pirates have had a successful raiding season. We have captured two ships, and now we need to keep track of them. 

Create a list view for the ships in our pirate fleet, and an edit page. You should be able to edit any of the properties of the ship:

- Captain (this will be an id that can pull in the crew_id from the crew table)
- Displacement
- Length
- Draft
- Saltiness of the crew
- Number of cannons (0-10)

That should be easy by now. Here’s where it gets interesting. You need to create a different level of access for Admiral Blackbird to be able to order the ships to perform any of these actions:

- Assign/Move crew between ships
- Rename a ship
- Be able to use treasure to buy more ships and crew (Use a trait to be able to spend or earn treasure).

Ensure that only one pirate can have a given rank on a ship, allow pirates to be able to be unassigned for rank and ship. 


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
