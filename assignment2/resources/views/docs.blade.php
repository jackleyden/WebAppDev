@extends('layouts.app')

@section('content')
 <div class= "row" id="content">
        
        <div class="col-md-12">
            <div class="col-md-6">
                <h1> WebAppDev Assignment 2:</h1>
                <h3> Built by: Jack Leyden</h3>
                <h5> Email: Jack.Leyden@griffithuni.edu.au</h5>
                <h5> Number: s5052939</h5>
            </div>
            <div class="col-md-6">
                <h2>ER Diagram:</h2>
                <img style="background-color:white;" src="images/Assignment2 WD.png">
            </div>
            <h4>Overall View:</h4>
            <p>
                <ul>
                <li><h4>Complete: </h4></li>
                This project has been a success with most tasks functioning as per the task sheets requirements. 
                All the key features except auth redirection have been successfully  implemented. 
                
                <li><h4>Not able to complete: </h4></li>
                    Auth redirection is present however was not implemented to the extent of the criteria sheet.
                    An example is when the user logs in and they will be directed to the recommendations page. 
                    However, if they logged in from a products page it would not take them back there.
                    
                    This was not achieved due to prioritisation of the assessment criteria. Time was running short 
                    and the solution never over that space of time. 
                    
                <li><h4>Approaches made:</h4></li>
                    <h5>
                    User Authentication:
                    </h5><p>
                        This feature is setup in laravel automatically. Only a few minor adjustments had to be made for the main feature that needed to be added.
                        This was the type column as it would identify what permission each user had.
                    </p><h5>
                    Different Authorisations:
                        </h5><p>
                           This was achieved by calling auth user type in the user database to check the current logged in user against the criterion stating who should have access. 
                           This check was also placed on the front end of the site to ensure that users logged in cannot see what they do not have access to.
                        </p><h5>
                    Pagination:
                        </h5><p>
                            This was the easiest feature to add as it was just adding the paginate function 
                            onto the DB call in the controller and add links to allow navigation.
                        </p><h5>
                    Upload Photos:
                        </h5><p>
                            This was one of the harder features to add as the form initially did not send the image data to the server. 
                            It was discovered that post had to be all caps or else the post never would register. 
                        </p><h5>
                    Like Review:
                        </h5><p>
                            This involved creating a new table that kept track of each like/dislike assigned to a comment and who assigned it. An if statement was added to the 
                            div surrounding the data to change the colour of the div if the dislikes outnumbered the likes. 
                        </p><h5>
                    Follow: 
                        </h5><p>
                            Follow was another table added which kept track of each user's follows. It consisted of just the users. This data was then used to display who you 
                            were following as well as suggest who you might want to follow.
                        </p><h5>
                    Recommendations: 
                        </h5><p>
                            This feature is a frankenstein's monster of all the features previously stated. When a user gives a high rank and a user follows them any of their 
                            other high ranks will show as well in a list of other users who ranked this highly as a suggestion on who you may also like.
                        </p>
                </ul>
            </p>
        </div>
    </div>
@endsection
