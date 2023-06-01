<!DOCTYPE html>
<html>
<head>
    <title>Survey</title>

    <link rel="stylesheet" type="text/css" href="/css/stylingsurveys.css">
    <link rel="stylesheet" type="text/css" href="/css/styling.css">
    <link rel="stylesheet" type="text/css" href="/css/surveystars.css">
    <link rel="stylesheet" href="/css/WelcomePage.css">
    <script src="/js/surveyscript.js"></script>

    <style>
        .hidden {
            display: none;
        }
         .progress-bar {
             width: 100%;
             height: 20px;
             background-color: #f0f0f0;
             border-radius: 5px;
             margin-bottom: 10px;
         }

        .progress {
            height: 100%;
            width: 0;
            background-color: #4caf50;
            border-radius: 5px;
            transition: width 0.3s;
        }
    </style>

</head>

<header>
    <h1>VVW Schelde Flushing</h1>
    <nav class="topnav">
        <ul>
            <li><a class="{{ Request::path() === '/' ? 'active' : '' }}" href="{{ url('/') }}">Home</a></li>
            <li><a class="{{ Request::path() === 'survey' ? 'active' : '' }}" href="{{ url('/survey') }}">Survey</a></li>
            @guest
                <li><a class="{{ Request::path() === 'dashboard' ? 'active' : '' }}" href="{{ url('/login') }}">Login</a></li>
            @endguest
            @auth
                <li><a class="{{ Request::path() === 'dashboard' ? 'active' : '' }}" href="{{ url('/dashboard') }}">Dashboard</a></li>
            @endauth
        </ul>
    </nav>
</header>
<body>

<form method="POST" action="/survey/submition">
    @csrf

    <div class="progress-bar">
        <div class="progress" id="progress"></div>
    </div>

    <div id="page1">
        <label for="Nationality">{{ trans('messages.demoquestion1') }}</label>
        <select id="Nationality" name="Nationality" required>
            <option value="Dutch">Dutch</option>
            <option value="English">English</option>
            <option value="French">French</option>
            <option value="German">German</option>
        </select><br><br>

        <label for="AgeOfVisitor">{{ trans('messages.demoquestion2') }}</label>
        <input type="number" id="AgeOfVisitor" name="AgeOfVisitor" required>
        <br><br>

        <label for="TypeOfVessel">{{ trans('messages.demoquestion3') }}</label>
        <input type="text" id="TypeOfVessel" name="TypeOfVessel" required>
        <br><br>

        <label for="PeopleOnBoard">{{ trans('messages.demoquestion4') }}</label>
        <select id="PeopleOnBoard" name="PeopleOnBoard" required>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
            <option value="7">7</option>
            <option value="8">8</option>
            <option value="9">9</option>
            <option value="10">10</option>
        </select>
        <br><br>

        <label for="WhichSeason">{{ trans('messages.demoquestion5') }}</label>
        <select id="WhichSeason" name="WhichSeason" required>
            <option value="Spring">Spring</option>
            <option value="Summer">Summer</option>
            <option value="Autumn">Autumn</option>
            <option value="Winter">Winter</option>
        </select>
        <br><br>

    </div>

    <div id="page2" class="hidden">
        <label for="HearAboutHarbour">{{ trans('messages.demoquestion6') }}</label>
        <select id="HearAboutHarbour" name="HearAboutHarbour" required>
            <option value="internet">internet</option>
            <option value="almanac">almanac</option>
            <option value="recommended by others">recommended by others</option>
            <option value="different">different</option>
        </select>
        <br><br>

        <label for="WhichHarbour">{{ trans('messages.demoquestion7') }}</label>
        <select id="WhichHarbour" name="WhichHarbour" required>
            <option value="V.V.W Schelde">V.V.W Schelde</option>
            <option value="Stadshaven Scheldekwartier">Stadshaven Scheldekwartier</option>
        </select>
        <br><br>

        <label for="FirstVisit">{{ trans('messages.demoquestion8') }}</label>
        <select id="FirstVisit" name="FirstVisit" required>
            <option value="1">{{ trans('messages.yes') }}</option>
            <option value="0">{{ trans('messages.no') }}</option>
        </select>
        <br><br>

        <label for="CompletePurpose">{{ trans('messages.multiquestion1') }}</label>
        <select id="CompletePurpose" name="CompletePurpose" required>
            <option value="1">{{ trans('messages.yes') }}</option>
            <option value="0">{{ trans('messages.no') }}</option>
        </select>
        <br><br>

        <label for="DescribeExperience">{{ trans('messages.multiquestion2') }}</label>
        <select id="DescribeExperience" name="DescribeExperience" required>
            <option value="The marina has a nice atmosphere, and I enjoyed my stay">{{ trans('messages.answerA10') }}</option>
            <option value="The marina was average for me the experience was alright">{{ trans('messages.answerB10') }}</option>
            <option value="I had an unsatisfactory experience and I did not enjoy my stay">{{ trans('messages.answerC10') }}</option>
        </select>
        <br><br>
    </div>

    <div id="page3" class="hidden">
        <label for="DescribeWebsite">{{ trans('messages.multiquestion3') }}</label>
        <select id="DescribeWebsite" name="DescribeWebsite" required>
            <option value="It is a good-designed website">{{ trans('messages.answerA11') }}</option>
            <option value="The website could use some improvements">{{ trans('messages.answerB11') }}</option>
            <option value="I did not like the website">{{ trans('messages.answerC11') }}</option>
        </select>
        <br><br>

        <label for="ConsiderAgain">{{ trans('messages.multiquestion4') }}</label>
        <select id="ConsiderAgain" name="ConsiderAgain" required>
            <option value="1">{{ trans('messages.yes') }}</option>
            <option value="0">{{ trans('messages.no') }}</option>
        </select>
        <br><br>

        <label for="OverallCleanliness">{{ trans('messages.ratingquestion1') }}</label>
        <div class="rating">
            <input type="radio" id="ocStar5" name="OverallCleanliness" value="5" required/><label for="ocStar5" title="5 stars"></label>
            <input type="radio" id="ocStar4" name="OverallCleanliness" value="4" /><label for="ocStar4" title="4 stars"></label>
            <input type="radio" id="ocStar3" name="OverallCleanliness" value="3" /><label for="ocStar3" title="3 stars"></label>
            <input type="radio" id="ocStar2" name="OverallCleanliness" value="2" /><label for="ocStar2" title="2 stars"></label>
            <input type="radio" id="ocStar1" name="OverallCleanliness" value="1" /><label for="ocStar1" title="1 star"></label>
        </div>
        <br><br>

        <label for="StaffFriendlyAndHelpful">{{ trans('messages.ratingquestion2') }}</label>
        <div class="rating">
            <input type="radio" id="staffStar5" name="StaffFriendlyAndHelpful" value="5" required/><label for="staffStar5" title="5 stars"></label>
            <input type="radio" id="staffStar4" name="StaffFriendlyAndHelpful" value="4" /><label for="staffStar4" title="4 stars"></label>
            <input type="radio" id="staffStar3" name="StaffFriendlyAndHelpful" value="3" /><label for="staffStar3" title="3 stars"></label>
            <input type="radio" id="staffStar2" name="StaffFriendlyAndHelpful" value="2" /><label for="staffStar2" title="2 stars"></label>
            <input type="radio" id="staffStar1" name="StaffFriendlyAndHelpful" value="1" /><label for="staffStar1" title="1 star"></label>
        </div>
        <br><br>

        <label for="SafetyAtTheHarbour">{{ trans('messages.ratingquestion3') }}</label>
        <div class="rating">
            <input type="radio" id="star5-safety" name="SafetyAtTheHarbour" value="5" required/><label for="star5-safety" title="5 stars"></label>
            <input type="radio" id="star4-safety" name="SafetyAtTheHarbour" value="4" /><label for="star4-safety" title="4 stars"></label>
            <input type="radio" id="star3-safety" name="SafetyAtTheHarbour" value="3" /><label for="star3-safety" title="3 stars"></label>
            <input type="radio" id="star2-safety" name="SafetyAtTheHarbour" value="2" /><label for="star2-safety" title="2 stars"></label>
            <input type="radio" id="star1-safety" name="SafetyAtTheHarbour" value="1" /><label for="star1-safety" title="1 star"></label>
        </div>
        <br><br>
    </div>


    <div id="page4" class="hidden">
        <label for="OurFacilities">{{ trans('messages.ratingquestion4') }}</label>
        <div class="rating">
            <input type="radio" id="star5-OurFacilities" name="OurFacilities" value="5" required/><label for="star5-OurFacilities" title="5 stars"></label>
            <input type="radio" id="star4-OurFacilities" name="OurFacilities" value="4" /><label for="star4-OurFacilities" title="4 stars"></label>
            <input type="radio" id="star3-OurFacilities" name="OurFacilities" value="3" /><label for="star3-OurFacilities" title="3 stars"></label>
            <input type="radio" id="star2-OurFacilities" name="OurFacilities" value="2" /><label for="star2-OurFacilities" title="2 stars"></label>
            <input type="radio" id="star1-OurFacilities" name="OurFacilities" value="1" /><label for="star1-OurFacilities" title="1 star"></label>
        </div>
        <br><br>

        <label for="RateOverallExperience">{{ trans('messages.ratingquestion5') }}</label>
        <div class="rating">
            <input type="radio" id="star5-Experience" name="RateOverallExperience" value="5" required/><label for="star5-Experience" title="5 stars"></label>
            <input type="radio" id="star4-Experience" name="RateOverallExperience" value="4" /><label for="star4-Experience" title="4 stars"></label>
            <input type="radio" id="star3-Experience" name="RateOverallExperience" value="3" /><label for="star3-Experience" title="3 stars"></label>
            <input type="radio" id="star2-Experience" name="RateOverallExperience" value="2" /><label for="star2-Experience" title="2 stars"></label>
            <input type="radio" id="star1-Experience" name="RateOverallExperience" value="1" /><label for="star1-Experience" title="1 star"></label>
        </div>
        <br><br>

        <label for="RecommendToOthers">{{ trans('messages.ratingquestion6') }}</label>
        <div class="rating">
            <input type="radio" id="star5-Others" name="RecommendToOthers" value="5" required/><label for="star5-Others" title="5 stars"></label>
            <input type="radio" id="star4-Others" name="RecommendToOthers" value="4" /><label for="star4-Others" title="4 stars"></label>
            <input type="radio" id="star3-Others" name="RecommendToOthers" value="3" /><label for="star3-Others" title="3 stars"></label>
            <input type="radio" id="star2-Others" name="RecommendToOthers" value="2" /><label for="star2-Others" title="2 stars"></label>
            <input type="radio" id="star1-Others" name="RecommendToOthers" value="1" /><label for="star1-Others" title="1 star"></label>
        </div>
        <br><br>

        <label for="QualityForMoney">{{ trans('messages.ratingquestion7') }}</label>
        <div class="rating">
            <input type="radio" id="star5-money" name="QualityForMoney" value="5" required/><label for="star5-money" title="5 stars"></label>
            <input type="radio" id="star4-money" name="QualityForMoney" value="4" /><label for="star4-money" title="4 stars"></label>
            <input type="radio" id="star3-money" name="QualityForMoney" value="3" /><label for="star3-money" title="3 stars"></label>
            <input type="radio" id="star2-money" name="QualityForMoney" value="2" /><label for="star2-money" title="2 stars"></label>
            <input type="radio" id="star1-money" name="QualityForMoney" value="1" /><label for="star1-money" title="1 star"></label>
        </div>
        <br><br>

        <label for="AnythingToImprove">{{ trans('messages.openquestion1') }}</label>
        <input type="text" id="AnythingToImprove" name="AnythingToImprove">
        <br><br>
    </div>

    <div id="page5" class="hidden">

        <label for="anyAdditionalAmenities">{{ trans('messages.openquestion2') }}</label>
        <input type="text" id="anyAdditionalAmenities" name="anyAdditionalAmenities">
        <br><br>

        <label for="SomethingToChangeWebsite">{{ trans('messages.openquestion3') }}</label>
        <input type="text" id="SomethingToChangeWebsite" name="SomethingToChangeWebsite">
        <br><br>

        <label for="AnythingLeft">{{ trans('messages.openquestion4') }}</label>
        <input type="text" id="AnythingLeft" name="AnythingLeft">
        <br><br>
    </div>
    <div>
        <button type="button" id="previousBtn" class="hidden" onclick="showPreviousPage()">Previous</button>
        <button type="button" id="nextBtn" onclick="showNextPage()">Next</button>
    </div>

    <br><br> <input type="submit" value="Submit">
</form>


</body>
<script>
    const totalPages = 5;
    let currentPage = 1;

    function showNextPage() {
        if (currentPage < totalPages) {
            document.getElementById(`page${currentPage}`).classList.add('hidden');
            document.getElementById(`page${currentPage + 1}`).classList.remove('hidden');
            currentPage++;
        }

        updatePaginationButtons();
        updateProgress();
    }

    function showPreviousPage() {
        if (currentPage > 1) {
            document.getElementById(`page${currentPage}`).classList.add('hidden');
            document.getElementById(`page${currentPage - 1}`).classList.remove('hidden');
            currentPage--;
        }

        updatePaginationButtons();
        updateProgress();
    }

    function updatePaginationButtons() {
        const previousBtn = document.getElementById('previousBtn');
        const nextBtn = document.getElementById('nextBtn');

        previousBtn.classList.toggle('hidden', currentPage === 1);
        nextBtn.classList.toggle('hidden', currentPage === totalPages);
    }

    function updateProgress() {
        const progress = (currentPage / totalPages) * 100;
        document.getElementById('progress').style.width = `${progress}%`;
    }
</script>
</html>
