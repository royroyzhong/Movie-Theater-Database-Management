<html>
    <head>

    </head>

    <body>
        <h2>Add Movie to your movies list</h2>
        <form method="POST" action="handlerinsert.php"> 
            <input type="hidden" id="insertQueryRequest" name="insertQueryRequest">
            
            Name: <input type="text" name="insName"> <br /><br />
            Type: <input type="text" name="insType"> <br /><br />
            Director: <input type="text" name="insDir"> <br /><br />
            Language: <input type="text" name="insLan"> <br /><br />

            <input type="submit" value="Add Movie" name="insertSubmit">
        </form>

        <hr/>
        <h2>Delete Movie from your movies list</h2>
        <form method="POST" action="handlerdelete.php"> 
            <input type="hidden" id="deleteQueryRequest" name="deleteQueryRequest">
            
            Name: <input type="text" name="delName"> <br /><br />
            Director: <input type="text" name="delDir"> <br /><br />

            <input type="submit" value="Delete Movie" name="deleteSubmit">
        </form>

        <hr/>
        <h2>Choose the Movie you wanna watch (Type & Language)</h2>
        <form method="POST" action="handlerSelection.php"> 
            <input type="hidden" id="selectQueryRequest" name="selectQueryRequest">
            <select id="selTable" name="selTableAll">
            <option value="">???</option>
            <option value="RomanticFilm">Romantic</option>
            <option value="AdventureFilm">Adventure</option>
            <option value="ComedyFilm">Comedy</option>
            <option value="ActionFilm">Action</option>
            </select>
            Language: <input type="text" name="selLan"> <br /><br />

            <input type="submit" value="Choose Movie" name="selectSubmit">
        </form>
        <hr/>


        <h2>Choose what you want to see in Our movie list </h2>
        <br />

        <form method="POST" action="handlerprojection.php"> 
        <!-- <input type="hidden" id="insertQueryRequest" name="insertQueryRequest"> -->
        <input type="checkbox" id="vehicle1" name="vehicle1" value="Name">
        <label for="vehicle1"> Name </label><br>

        <input type="checkbox" id="vehicle2" name="vehicle2" value="Type">
        <label for="vehicle2"> Type </label><br>

        <input type="checkbox" id="vehicle3" name="vehicle3" value="Director">
        <label for="vehicle3"> Director </label><br>

        <input type="checkbox" id="vehicle4" name="vehicle4" value="Language">
        <label for="vehicle4"> Language </label><br>

        <input type="submit"  name="insertProjection"> 

        </form>
        <hr/>
        
        <!-- <form method="POST" action="handlerprojection.php"> 

        <select id="insTable" name="insTableAll">
        <option value="Name">Name</option>
        <option value="Type">Type</option>
        <option value="Director">Director</option>
        <option value="Language">Language</option>
        <input type="submit"  name="insertProjection"> 
        </select>
        </form> -->

        <h2>Find the Corresponding Movie Name, product Info, Price and Theatre Location with the input year </h2>

        <form method="POST" action="handlerjoin.php"> 
            <input type="hidden" id="insertQueryRequest" name="insertQueryRequest">
            
            Input Year that after: <input type="text" name="insJoinPrice"> <br /><br />

            <input type="submit" name="insertJoin">
        
        </form>
        <hr/>

        <h2>Find the name of movie that are played at all theatre </h2>
        <form method="POST" action="handlerdivision.php"> 
        <input type="submit" value="Check" name="insertDiv"> 
        </select>
        </form>
        <hr/>


        <h2><h2>Find the box office for all director in our list</h2></h2>
        <br />
        <form method="POST" action="handlerGroupby.php"> 
        <input type="hidden" id="insertQueryRequest" name="insertQueryRequest">
        <select id="insGroupby" name="insGroupbyTable">
        <option value="min">min</option>
        <option value="max">max</option>
        <option value="avg">average</option>
        <input type="submit"  name="insertGB"> 
        </select>

        </form>
        <hr/>


        <h2>Find the director that has more than the box office of your input number</h2>
        <br />
        <form method="POST" action="handlerHaving.php"> 
        <input type="hidden" id="insertQueryRequest" name="insertQueryRequest">
        Box_office: <input type="text" name="insBoxOff"> <br /><br />
        <input type="submit"  name="insertHav"> 
        </form>
        <hr/>

        <h2>Select the type of rating to find the Rating for movie that after year 2000 and its director, for each director have at least 2 movie of any year</h2>
        <br />
        <!-- find the director that have movie year after 2000, for each director have at least 2 movie of any year -->
        <!-- find the att(rating) for movie and its director for each director have at least 2 movie of any year -->


        <form method="POST" action="handlerNested.php"> 
        <input type="hidden" id="insertQueryRequest" name="insertQueryRequest">
        <select id="insNested" name="insNestedTable">
        <option value="min">min</option>
        <option value="max">max</option>
        <option value="avg">average</option>
    

        <input type="submit"  name="insertNest"> 
        </select>

        </form>
        <hr/>

        <h2>Search by Your Own Customer ID, Update Information</h2>
        <form method="POST" action="handleUpdate.php"> <!--refresh page when submitted-->
            <input type="hidden" id="updateQueryRequest" name="updateQueryRequest">
            Your Customer's ID: <input type="text" name="id"> <br /><br /><br /><br /><br /><br />
            CustomerEmail: <input type="text" name="email"> <br /><br />
            CustomerPhone: <input type="text" name="phone"> <br /><br />
            CustomerName: <input type="text" name="name"> <br /><br />

        <input type="submit" value="Update" name="updateSubmit"></p>
        </form>

        <hr/>




	</body>
</html>
