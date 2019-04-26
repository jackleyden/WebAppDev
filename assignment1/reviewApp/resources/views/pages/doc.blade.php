@extends('layouts.master')

@section('title')
  index
@endsection

@section('content')
    <div class= "row" id="content">
        
        <div class="col-md-12">
            <div class="col-md-6">
                <h1> WebAppDev Assignment 1:</h1>
                <h3> Built by: Jack Leyden</h3>
                <h5> Email: Jack.Leyden@griffithuni.edu.au</h5>
                <h5> Number: s5052939</h5>
            </div>
            <div class="col-md-6">
                <h2>ER Diagram:</h2>
                <img src="images/ER.PNG">
            </div>
            <h4>Overall View:</h4>
            <p>
                This project has been a success with all tasks operational as of the last test. The key features such as list by reviews, manufacturer, average have been sucessfully 
                implemented as well as some extra features such as the search bar, manufacturer dropdown menu, and extra adding forms for the database such as user and manufacturer. 
                
                <ul>
                <li><h4>Not able to complete: </h4></li>
                    There were a few tasks that were difficult to complete such as ordering the items based on the comment and updateing queries when the table structure had to change.
                    However, all these tasks are completed and fixed.
                
                <li><h4>Interesting approaches made:</h4></li>
                    <h5>
                    SQL through route exception: 
                    </h5><p>
                       When developing the site to use sql all queries were routed through the router in order to keep the template as cleen as possible. There is one exception 
                       to this where some php and sql had to be executed. This was because the data could not be retrieved without reloading the page multiple times as well as lots of pulling and pushing of data.
                       Comparing that routing method to one loop the method that would result in less mess was the php in the template. 
                    </p><h5>
                    Sorting the items in order:
                        </h5><p>
                        In order to get the items to sort in order an sql select query was created. This sql feature had to 
                        find the least commented item and then posted in ascending order. This was because when the search 
                        for the most commented item was done only commented items apeared.In order to stop this the least 
                        commented posts were found and then the diplay was flipped to order from most to least.
                    </p><h5>
                    Display by manufacturer:
                        </h5><p>
                        For the manufacturer page to work the page first had to retrieve the data on the manufacturers. After that a for loop was created to list off all the manufacturers.
                        The user would select a link which then goes back to the router, grabs the items relevent to that manufacturer and sends it back to the 
                        page where another for loop would display the data selected.
                    </p><h5>
                    Display average:
                        </h5><p>
                        This was a matter of copying the count query on the home page and changing it to average. This was to allow the order of the posts to be by the average rateing. 
                        However, when this was done the items with no value never showed up. This ment another query had to be added which found all the null 
                        values. The data was then gathered and sent to the average page where two for loops would posted the data. Specifically the 
                        first loop was for the no null values and the second was for the null values. Some if statements were added to ensure that if a problem with gathering 
                        the no null values arrose, all the data would appear in the null loop.
                    </p>
                
    
                <li><h4>Additional features:</h4></li>
                <h5>
                Adding manufacturer:
                    </h5><p>
                    Even though manufacturer was not required as a seperate table it helped with minimising data redundancy. A new table was created for storing the manufacturer's 
                    details which was basically just the name.However, this table was used to ensure that the user, when adding an item, could select from a short 
                    list of manufacturers in a drop down menu simplifying the process. The menu was easy enough to make in the form, however, a forloop was required to add all the options
                    to the menu efficiently. Add manufacturer was also added under add item so that when filling out the form the user could have the option to add a new manufacturer.
                </p><h5>
                Add user: 
                    </h5><p>
                    In this feature all usernames must be unique. This feature was created so that when a comment was to be written the user merly had to write 
                    there username, however, if dummy text was entered as the user nothing would happen because the user didn't exist. 
                    Therefore add user had to be made inorder for new users to be created. 
                </p><h5>
                Search Bar:
                    </h5><p>
                    To implement this, a simple query was written to check all the item data and see if any of it was like the search.
                    This is to help the user find any item they wish to buy without scrolling through results. when the search butten is pressed the query 
                    would commence the search and forward the results to the results page displaying all items relevent to the search.
                </p>
                </ul>
            </p>
        </div>
    </div>
@endsection