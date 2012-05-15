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

	games.each(renderSummonerGame);
}
 
function renderSummonerGame( game) {
	var current = 'game_'+game.InternalGameId;
	$('games').insert( Builder.node( 'div', { id:current}));
	
	renderChampionTable( game, current);
}

function renderChampionTable( game, current) {
	var championName = getChampionName(game.ChampionId);

	var gameTable =
		Builder.node( 'table',	{
									width: '100%',
									cellpadding: '2',
									cellspacing: '0',
									boder: '1',
								});

	var gameTable_tbody =
		Builder.node( 'tbody');
	
	var gameTable_tr_championIcon =
		Builder.node( 'tr', { colspan: '2'});
	
	var gameTable_tr_otherInformations =
		Builder.node( 'tr');
	
	gameTable_tr_championIcon = appendChilds( gameTable_tr_championIcon,
		Builder.node('td', { colspan: '2'}, image('Champion/Large/' + championName + '.png', championName, 100, 100)));
	gameTable_tr_otherInformations = appendChilds( gameTable_tr_otherInformations,
		Builder.node('td', championName),
		Builder.node('td', 'Not Implement'));
	
	gameTable_tbody.appendChild(gameTable_tr_championIcon);
	gameTable_tbody.appendChild(gameTable_tr_otherInformations);
	gameTable.appendChild(gameTable_tbody);
	
	$(current).insert(gameTable);
}
