function viewMatchHistory(region, accountId)
{
	apiGetSummonerProfile(region, accountId, function (response) { onGetSummonerProfileForMatchHistory(response, region); } );
}
  
function renderMatchHistory( summoner, games)
{
	setTitle('Games of ' + summoner.SummonerName);
	var linkContainer = paragraph(anchor('Return to profile', function () { system.summonerHandler.open(getRegion(summoner.Region).abbreviation, summoner.AccountId); } ));
	linkContainer.id = 'returnFromMatchHistory';
	render( linkContainer);
	renderSummonerGames( summoner, games);
}
 
function renderSummonerGames(summoner, games)
{
	var element = Builder.node('div', { id:'games' });
	$('content').appendChild(element);
}


