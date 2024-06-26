<!DOCTYPE html>
<html lang="en">

<head>
    <title>Survey</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">

    <link rel="stylesheet" type="text/css" href="/css/stylingsurveys.css">
    <link rel="stylesheet" type="text/css" href="/css/styling.css">
    <link rel="stylesheet" type="text/css" href="/css/surveystars.css">
    <link rel="stylesheet" href="/css/WelcomePage.css">
</head>

<body class="bg-gray-100">

<header class="bg-blue-500 py-8">
    <div class="container mx-auto">
        <h1 class="text-white text-4xl font-bold text-center">VVW Schelde Flushing</h1>
        <nav class="mt-6">
            <ul class="flex justify-center space-x-6">
                <li><a class="text-white hover:text-gray-200" href="{{ url('/') }}">Home</a></li>
                <li><a class="text-white hover:text-gray-200" href="{{ url('/survey') }}">Survey</a></li>
                @guest
                    <li><a class="text-white hover:text-gray-200" href="{{ url('/login') }}">Login</a></li>
                @endguest
                @auth
                    <li><a class="text-white hover:text-gray-200" href="{{ url('/dashboard') }}">Dashboard</a></li>
                @endauth
            </ul>
        </nav>
    </div>

</header>
@if($errors->any())
    <div class="bg-red-500 text-white p-4 flex justify-center items-center h-16">
        <p class="text-white text-center">An error has occurred. Please check your answers again.</p>
    </div>
@endif
<form method="POST" action="/survey/submition/{{ app()->getLocale() }}">
    @csrf

    <div class="w-full h-2 bg-gray-300 rounded-full mb-4">
        <div class="h-full bg-green-500 rounded-full" id="progress"></div>
    </div>

    <div id="page1" class="max-w-md mx-auto p-6 bg-gray-100 rounded-lg shadow-lg">
        <label for="Nationality" class="block mb-2 text-lg font-medium text-gray-800">{{ trans('messages.demoquestion1') }}</label>
        <select id="Nationality" name="Nationality" required class="w-full py-2 px-4 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
            <option value="Dutch" @if(old('Nationality') == 'Dutch') selected @endif>{{ trans('messages.answerA1') }}</option>
            <option value="English" @if(old('Nationality') == 'English') selected @endif>{{ trans('messages.answerB1') }}</option>
            <option value="French" @if(old('Nationality') == 'French') selected @endif>{{ trans('messages.answerC1') }}</option>
            <option value="German" @if(old('Nationality') == 'German') selected @endif>{{ trans('messages.answerD1') }}</option>
        </select>

        <label for="AgeOfVisitor" class="block mt-4 mb-2 text-lg font-medium text-gray-800">{{ trans('messages.demoquestion2') }}</label>
        <input type="text" id="AgeOfVisitor" name="AgeOfVisitor" class="w-full py-2 px-4 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
        @error('AgeOfVisitor')
        <div class="text-red-500 text-sm">{{ $message }}</div>
        @enderror

        <label for="TypeOfVessel" class="block mt-4 mb-2 text-lg font-medium text-gray-800">{{ trans('messages.demoquestion3') }}</label>
        <select id="TypeOfVessel" name="TypeOfVessel" required class="w-full py-2 px-4 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
            <option value="Sailboat" @if(old('TypeOfVessel') == 'Sailboat') selected @endif>Sailboat</option>
            <option value="Motorboat" @if(old('TypeOfVessel') == 'Motorboat') selected @endif>Motorboat</option>
        </select>

        <label for="PeopleOnBoard" class="block mt-4 mb-2 text-lg font-medium text-gray-800">{{ trans('messages.demoquestion4') }}</label>
        <select id="PeopleOnBoard" name="PeopleOnBoard" required class="w-full py-2 px-4 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
            @for ($i = 1; $i <= 10; $i++)
                <option value="{{ $i }}" @if(old('PeopleOnBoard') == $i) selected @endif>{{ $i }}</option>
            @endfor
        </select>

        <label for="WhichSeason" class="block mt-4 mb-2 text-lg font-medium text-gray-800">{{ trans('messages.demoquestion5') }}</label>
        <select id="WhichSeason" name="WhichSeason" required class="w-full py-2 px-4 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
            <option value="Spring" @if(old('WhichSeason') == 'Spring') selected @endif>{{ trans('messages.answerA5') }}</option>
            <option value="Summer" @if(old('WhichSeason') == 'Summer') selected @endif>{{ trans('messages.answerB5') }}</option>
            <option value="Autumn" @if(old('WhichSeason') == 'Autumn') selected @endif>{{ trans('messages.answerC5') }}</option>
            <option value="Winter" @if(old('WhichSeason') == 'Winter') selected @endif>{{ trans('messages.answerD5') }}</option>
        </select>
    </div>

    <div id="page2" class="hidden max-w-md mx-auto p-6 bg-gray-100 rounded-lg shadow-lg">
        <label for="HearAboutHarbour" class="block mb-2 text-lg font-medium text-gray-800">{{ trans('messages.demoquestion6') }}</label>
        <select id="HearAboutHarbour" name="HearAboutHarbour" required class="w-full py-2 px-4 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
            <option value="internet" @if(old('HearAboutHarbour') == 'internet') selected @endif>{{ trans('messages.answerA6') }}</option>
            <option value="almanac" @if(old('HearAboutHarbour') == 'almanac') selected @endif>{{ trans('messages.answerB6') }}</option>
            <option value="recommended by others" @if(old('HearAboutHarbour') == 'recommended by others') selected @endif>{{ trans('messages.answerC6') }}</option>
            <option value="different" @if(old('HearAboutHarbour') == 'different') selected @endif>{{ trans('messages.answerD6') }}</option>
        </select>

        <label for="WhichHarbour" class="block mt-4 mb-2 text-lg font-medium text-gray-800">{{ trans('messages.demoquestion7') }}</label>
        <select id="WhichHarbour" name="WhichHarbour" required class="w-full py-2 px-4 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
            <option value="V.V.W Schelde" @if(old('WhichHarbour') == 'V.V.W Schelde') selected @endif>V.V.W Schelde</option>
            <option value="Stadshaven Scheldekwartier" @if(old('WhichHarbour') == 'Stadshaven Scheldekwartier') selected @endif>Stadshaven Scheldekwartier</option>
        </select>

        <label for="FirstVisit" class="block mt-4 mb-2 text-lg font-medium text-gray-800">{{ trans('messages.demoquestion8') }}</label>
        <select id="FirstVisit" name="FirstVisit" required class="w-full py-2 px-4 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
            <option value="1" @if(old('FirstVisit') == '1') selected @endif>{{ trans('messages.yes') }}</option>
            <option value="0" @if(old('FirstVisit') == '0') selected @endif>{{ trans('messages.no') }}</option>
        </select>

        <label for="CompletePurpose" class="block mt-4 mb-2 text-lg font-medium text-gray-800">{{ trans('messages.multiquestion1') }}</label>
        <select id="CompletePurpose" name="CompletePurpose" required class="w-full py-2 px-4 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
            <option value="1" @if(old('CompletePurpose') == '1') selected @endif>{{ trans('messages.yes') }}</option>
            <option value="0" @if(old('CompletePurpose') == '0') selected @endif>{{ trans('messages.no') }}</option>
        </select>

        <label for="DescribeExperience" class="block mt-4 mb-2 text-lg font-medium text-gray-800">{{ trans('messages.multiquestion2') }}</label>
        <select id="DescribeExperience" name="DescribeExperience" required class="w-full py-2 px-4 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
            <option value="The marina has a nice atmosphere, and I enjoyed my stay" @if(old('DescribeExperience') == 'The marina has a nice atmosphere, and I enjoyed my stay') selected @endif>{{ trans('messages.answerA10') }}</option>
            <option value="The marina was average for me the experience was alright" @if(old('DescribeExperience') == 'The marina was average for me the experience was alright') selected @endif>{{ trans('messages.answerB10') }}</option>
            <option value="I had an unsatisfactory experience and I did not enjoy my stay" @if(old('DescribeExperience') == 'I had an unsatisfactory experience and I did not enjoy my stay') selected @endif>{{ trans('messages.answerC10') }}</option>
        </select>
    </div>

    <div id="page3" class="hidden max-w-md mx-auto p-6 bg-gray-100 rounded-lg shadow-lg">
        <label for="DescribeWebsite" class="block mb-2 text-lg font-medium text-gray-800">{{ trans('messages.multiquestion3') }}</label>
        <select id="DescribeWebsite" name="DescribeWebsite" required class="w-full py-2 px-4 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
            <option value="It is a good-designed website" @if(old('DescribeWebsite') == 'It is a good-designed website') selected @endif>{{ trans('messages.answerA11') }}</option>
            <option value="The website could use some improvements" @if(old('DescribeWebsite') == 'The website could use some improvements') selected @endif>{{ trans('messages.answerB11') }}</option>
            <option value="I did not like the website" @if(old('DescribeWebsite') == 'I did not like the website') selected @endif>{{ trans('messages.answerC11') }}</option>
        </select>

        <label for="ConsiderAgain" class="block mt-4 mb-2 text-lg font-medium text-gray-800">{{ trans('messages.multiquestion4') }}</label>
        <select id="ConsiderAgain" name="ConsiderAgain" required class="w-full py-2 px-4 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
            <option value="1" @if(old('ConsiderAgain') == '1') selected @endif>{{ trans('messages.yes') }}</option>
            <option value="0" @if(old('ConsiderAgain') == '0') selected @endif>{{ trans('messages.no') }}</option>
        </select>

        <label for="OverallCleanliness" class="block mt-4 mb-2 text-lg font-medium text-gray-800">{{ trans('messages.ratingquestion1') }}</label>
        <div class="rating">
            <input type="radio" id="ocStar5" name="OverallCleanliness" value="5" @if(old('OverallCleanliness') == '5') checked @endif/><label for="ocStar5" title="5 stars"></label>
            <input type="radio" id="ocStar4" name="OverallCleanliness" value="4" @if(old('OverallCleanliness') == '4') checked @endif/><label for="ocStar4" title="4 stars"></label>
            <input type="radio" id="ocStar3" name="OverallCleanliness" value="3" @if(old('OverallCleanliness') == '3') checked @endif/><label for="ocStar3" title="3 stars"></label>
            <input type="radio" id="ocStar2" name="OverallCleanliness" value="2" @if(old('OverallCleanliness') == '2') checked @endif/><label for="ocStar2" title="2 stars"></label>
            <input type="radio" id="ocStar1" name="OverallCleanliness" value="1" @if(old('OverallCleanliness') == '1') checked @endif/><label for="ocStar1" title="1 star"></label>
        </div>
        @error('OverallCleanliness')
        <div class="text-red-500 text-sm">{{ $errors->first('OverallCleanliness') }}</div>
        @enderror

        <label for="StaffFriendlyAndHelpful" class="block mt-4 mb-2 text-lg font-medium text-gray-800">{{ trans('messages.ratingquestion2') }}</label>
        <div class="rating">
            <input type="radio" id="staffStar5" name="StaffFriendlyAndHelpful" value="5" @if(old('StaffFriendlyAndHelpful') == '5') checked @endif/><label for="staffStar5" title="5 stars"></label>
            <input type="radio" id="staffStar4" name="StaffFriendlyAndHelpful" value="4" @if(old('StaffFriendlyAndHelpful') == '4') checked @endif/><label for="staffStar4" title="4 stars"></label>
            <input type="radio" id="staffStar3" name="StaffFriendlyAndHelpful" value="3" @if(old('StaffFriendlyAndHelpful') == '3') checked @endif/><label for="staffStar3" title="3 stars"></label>
            <input type="radio" id="staffStar2" name="StaffFriendlyAndHelpful" value="2" @if(old('StaffFriendlyAndHelpful') == '2') checked @endif/><label for="staffStar2" title="2 stars"></label>
            <input type="radio" id="staffStar1" name="StaffFriendlyAndHelpful" value="1" @if(old('StaffFriendlyAndHelpful') == '1') checked @endif/><label for="staffStar1" title="1 star"></label>
        </div>
        @error('StaffFriendlyAndHelpful')
        <div class="text-red-500 text-sm">{{ $errors->first('StaffFriendlyAndHelpful') }}</div>
        @enderror

        <label for="SafetyAtTheHarbour" class="block mt-4 mb-2 text-lg font-medium text-gray-800">{{ trans('messages.ratingquestion3') }}</label>
        <div class="rating">
            <input type="radio" id="star5-safety" name="SafetyAtTheHarbour" value="5" @if(old('SafetyAtTheHarbour') == '5') checked @endif/><label for="star5-safety" title="5 stars"></label>
            <input type="radio" id="star4-safety" name="SafetyAtTheHarbour" value="4" @if(old('SafetyAtTheHarbour') == '4') checked @endif/><label for="star4-safety" title="4 stars"></label>
            <input type="radio" id="star3-safety" name="SafetyAtTheHarbour" value="3" @if(old('SafetyAtTheHarbour') == '3') checked @endif/><label for="star3-safety" title="3 stars"></label>
            <input type="radio" id="star2-safety" name="SafetyAtTheHarbour" value="2" @if(old('SafetyAtTheHarbour') == '2') checked @endif/><label for="star2-safety" title="2 stars"></label>
            <input type="radio" id="star1-safety" name="SafetyAtTheHarbour" value="1" @if(old('SafetyAtTheHarbour') == '1') checked @endif/><label for="star1-safety" title="1 star"></label>
        </div>
        @error('SafetyAtTheHarbour')
        <div class="text-red-500 text-sm">{{ $errors->first('SafetyAtTheHarbour') }}</div>
        @enderror
    </div>


    <div id="page4" class="hidden max-w-md mx-auto p-6 bg-gray-100 rounded-lg shadow-lg">
        <label for="OurFacilities" class="block mb-2 text-lg font-medium text-gray-800">{{ trans('messages.ratingquestion4') }}</label>
        <div class="rating">
            <input type="radio" id="star5-OurFacilities" name="OurFacilities" value="5" @if(old('OurFacilities') == '5') checked @endif/><label for="star5-OurFacilities" title="5 stars"></label>
            <input type="radio" id="star4-OurFacilities" name="OurFacilities" value="4" @if(old('OurFacilities') == '4') checked @endif/><label for="star4-OurFacilities" title="4 stars"></label>
            <input type="radio" id="star3-OurFacilities" name="OurFacilities" value="3" @if(old('OurFacilities') == '3') checked @endif/><label for="star3-OurFacilities" title="3 stars"></label>
            <input type="radio" id="star2-OurFacilities" name="OurFacilities" value="2" @if(old('OurFacilities') == '2') checked @endif/><label for="star2-OurFacilities" title="2 stars"></label>
            <input type="radio" id="star1-OurFacilities" name="OurFacilities" value="1" @if(old('OurFacilities') == '1') checked @endif/><label for="star1-OurFacilities" title="1 star"></label>
        </div>
        @error('OurFacilities')
        <div class="text-red-500 text-sm">{{ $errors->first('OurFacilities') }}</div>
        @enderror
        <br><br>

        <label for="RateOverallExperience" class="block mb-2 text-lg font-medium text-gray-800">{{ trans('messages.ratingquestion5') }}</label>
        <div class="rating">
            <input type="radio" id="star5-Experience" name="RateOverallExperience" value="5" @if(old('RateOverallExperience') == '5') checked @endif/><label for="star5-Experience" title="5 stars"></label>
            <input type="radio" id="star4-Experience" name="RateOverallExperience" value="4" @if(old('RateOverallExperience') == '4') checked @endif/><label for="star4-Experience" title="4 stars"></label>
            <input type="radio" id="star3-Experience" name="RateOverallExperience" value="3" @if(old('RateOverallExperience') == '3') checked @endif/><label for="star3-Experience" title="3 stars"></label>
            <input type="radio" id="star2-Experience" name="RateOverallExperience" value="2" @if(old('RateOverallExperience') == '2') checked @endif/><label for="star2-Experience" title="2 stars"></label>
            <input type="radio" id="star1-Experience" name="RateOverallExperience" value="1" @if(old('RateOverallExperience') == '1') checked @endif/><label for="star1-Experience" title="1 star"></label>

        </div>
        @error('RateOverallExperience')
        <div class="text-red-500 text-sm">{{ $errors->first('RateOverallExperience') }}</div>
        @enderror
        <br><br>

        <label for="RecommendToOthers" class="block mb-2 text-lg font-medium text-gray-800">{{ trans('messages.ratingquestion6') }}</label>
        <div class="rating">
            <input type="radio" id="star5-Others" name="RecommendToOthers" value="5" @if(old('RecommendToOthers') == '5') checked @endif/><label for="star5-Others" title="5 stars"></label>
            <input type="radio" id="star4-Others" name="RecommendToOthers" value="4" @if(old('RecommendToOthers') == '4') checked @endif/><label for="star4-Others" title="4 stars"></label>
            <input type="radio" id="star3-Others" name="RecommendToOthers" value="3" @if(old('RecommendToOthers') == '3') checked @endif/><label for="star3-Others" title="3 stars"></label>
            <input type="radio" id="star2-Others" name="RecommendToOthers" value="2" @if(old('RecommendToOthers') == '2') checked @endif/><label for="star2-Others" title="2 stars"></label>
            <input type="radio" id="star1-Others" name="RecommendToOthers" value="1" @if(old('RecommendToOthers') == '1') checked @endif/><label for="star1-Others" title="1 star"></label>
        </div>
        @error('RecommendToOthers')
        <div class="text-red-500 text-sm">{{ $errors->first('RecommendToOthers') }}</div>
        @enderror
        <br><br>

        <label for="QualityForMoney" class="block mb-2 text-lg font-medium text-gray-800">{{ trans('messages.ratingquestion7') }}</label>
        <div class="rating">
            <input type="radio" id="star5-money" name="QualityForMoney" value="5" @if(old('QualityForMoney') == '5') checked @endif/><label for="star5-money" title="5 stars"></label>
            <input type="radio" id="star4-money" name="QualityForMoney" value="4" @if(old('QualityForMoney') == '4') checked @endif/><label for="star4-money" title="4 stars"></label>
            <input type="radio" id="star3-money" name="QualityForMoney" value="3" @if(old('QualityForMoney') == '3') checked @endif/><label for="star3-money" title="3 stars"></label>
            <input type="radio" id="star2-money" name="QualityForMoney" value="2" @if(old('QualityForMoney') == '2') checked @endif/><label for="star2-money" title="2 stars"></label>
            <input type="radio" id="star1-money" name="QualityForMoney" value="1" @if(old('QualityForMoney') == '1') checked @endif/><label for="star1-money" title="1 star"></label>
        </div>
        @error('QualityForMoney')
        <div class="text-red-500 text-sm">{{ $errors->first('QualityForMoney') }}</div>
        @enderror
        <br><br>

        <label for="AnythingToImprove" class="block mb-2 text-lg font-medium text-gray-800">{{ trans('messages.openquestion1') }}</label>
        <input type="text" id="AnythingToImprove" name="AnythingToImprove" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400" value="{{ old('AnythingToImprove') }}">
        @error('AnythingToImprove')
        <div class="text-red-500 text-sm">{{ $message }}</div>
        @enderror
        <br><br>
    </div>

    <div id="page5" class="hidden">
        <label for="anyAdditionalAmenities" class="block mb-2 text-lg font-medium text-gray-800">{{ trans('messages.openquestion2') }}</label>
        <input type="text" id="anyAdditionalAmenities" name="anyAdditionalAmenities" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400" value="{{ old('anyAdditionalAmenities') }}">
        @error('anyAdditionalAmenities')
        <div class="text-red-500 text-sm">{{ $message }}</div>
        @enderror
    <br><br>

        <label for="SomethingToChangeWebsite" class="block mb-2 text-lg font-medium text-gray-800">{{ trans('messages.openquestion3') }}</label>
        <input type="text" id="SomethingToChangeWebsite" name="SomethingToChangeWebsite" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400" value="{{ old('SomethingToChangeWebsite') }}">
        @error('SomethingToChangeWebsite')
        <div class="text-red-500 text-sm">{{ $message }}</div>
        @enderror
    <br><br>

        <label for="AnythingLeft" class="block mb-2 text-lg font-medium text-gray-800">{{ trans('messages.openquestion4') }}</label>
        <input type="text" id="AnythingLeft" name="AnythingLeft" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400" value="{{ old('AnythingLeft') }}">
        @error('AnythingLeft')
        <div class="text-red-500 text-sm">{{ $message }}</div>
        @enderror
    <br><br>
    </div>

    <div class="flex justify-between mt-8">
        <button type="button" id="previousBtn" class="px-4 py-2 text-lg font-medium text-white bg-gray-500 rounded-md hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-opacity-50 hidden" onclick="showPreviousPage()">Previous</button>
        <button type="button" id="nextBtn" class="px-4 py-2 text-lg font-medium text-white bg-blue-500 rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50" onclick="showNextPage()">Next</button>
    </div>

    <div class="mt-8 text-right">
        <input type="submit" value="Submit" class="px-6 py-3 text-lg font-medium text-white bg-green-500 rounded-md hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-opacity-50">
    </div>
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

    window.addEventListener("load", (   ) => {
        updateProgress();
});
</script>
</html>
