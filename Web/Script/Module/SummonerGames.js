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

	for( var i = 0; i < games.length; i = i + 2) {
		renderSummonerGame( games[i] , i);
		renderSummonerGame( games[i+1], i);
	}
}
 
function renderSummonerGame( game, div) {
	var current = 'game_'+div;
	$('games').insert( Builder.node( 'div', { id:current}));
	
	renderChampionTable( game, current);
}

function renderChampionTable( game, current) {
	var championName = getChampionName(game.ChampionId);

	var gameTable =
		Builder.node( 'table',	{
									width: '49%',
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
		Builder.node('td', { colspan: '2'}, image('Champion/Large/' + championName + '.png', championName, 140, 140)));
	gameTable_tr_otherInformations = appendChilds( gameTable_tr_otherInformations,
		Builder.node('td', championName),
		Builder.node('td',
			image('Spell/Small/' + game.SummonerSpell1 + '.png', getSummonerSpell(game.SummonerSpell1), 20, 20) +
			image('Spell/Small/' + game.SummonerSpell2 + '.png', getSummonerSpell(game.SummonerSpell2), 20, 20)
		)
	);
	
	gameTable_tbody.appendChild(gameTable_tr_championIcon);
	gameTable_tbody.appendChild(gameTable_tr_otherInformations);
	gameTable.appendChild(gameTable_tbody);
	
	$(current).insert(gameTable);
}
