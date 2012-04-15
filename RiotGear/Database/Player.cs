﻿using System;
using System.Collections.Generic;
using System.Linq;
using System.Web.Script.Serialization;

using Nil;

namespace RiotGear
{
	public class Player
	{
		[ScriptIgnore]
		public int GameId;
		[ScriptIgnore]
		public int TeamId;
		[ScriptIgnore]
		public int SummonerId;

		public int Ping;
		public int TimeSpentInQueue;

		public int PremadeSize;

		public int ExperienceEarned;
		public int BoostedExperienceEarned;

		public int IPEarned;
		public int BoostedIPEarned;

		public int SummonerLevel;

		public int SummonerSpell1;
		public int SummonerSpell2;

		public int ChampionId;

		//May be null
		public string SkinName;
		public int SkinIndex;

		public int ChampionLevel;

		public int[] Items;

		public int Kills;
		public int Deaths;
		public int Assists;

		public int MinionKills;

		public int Gold;

		public int DamageDealt;
		public int PhysicalDamageDealt;
		public int MagicalDamageDealt;

		public int DamageTaken;
		public int PhysicalDamageTaken;
		public int MagicalDamageTaken;

		public int TotalHealingDone;

		public int TimeSpentDead;

		public int LargestMultiKill;
		public int LargestKillingSpree;
		public int LargestCritcalStrike;

		//Summoner's Rift/Twisted Treeline

		public int? NeutralMinionsKilled;

		public int? TurretsDestroyed;
		public int? InhibitorsDestroyed;

		//Dominion

		public int? NodesNeutralised;
		public int? NodeNeutralisationAssists;
		public int? NodesCaptured;

		public int? VictoryPoints;
		public int? Objectives;

		public int? TotalScore;
		public int? ObjectiveScore;
		public int? CombatScore;

		public int? Rank;

		protected static string[] Fields =
		{
			"game_id",
			"team_id",
			"summoner_id",

			"ping",
			"time_spent_in_queue",

			"premade_size",

			"experience_earned",
			"boosted_experience_earned",

			"ip_earned",
			"boosted_ip_earned",

			"summoner_level",

			"summoner_spell1",
			"summoner_spell2",

			"champion_id",

			"skin_name",
			"skin_index",

			"champion_level",

			//Array
			"items",

			"kills",
			"deaths",
			"assists",

			"minion_kills",

			"gold",

			"damage_dealt",
			"physical_damage_dealt",
			"magical_damage_dealt",

			"damage_taken",
			"physical_damage_taken",
			"magical_damage_taken",

			"total_healing_done",

			"time_spent_dead",

			"largest_multikill",
			"largest_killing_spree",
			"largest_critical_strike",

			//Summoner's Rift/Twisted Treeline

			"neutral_minions_killed",

			"turrets_destroyed",
			"inhibitors_destroyed",

			//Dominion

			"nodes_neutralised",
			"node_neutralisation_assists",
			"nodes_captured",

			"victory_points",
			"objectives",

			"total_score",
			"objective_score",
			"combat_score",

			"rank",
		};

		public Player(DatabaseReader reader)
		{
			GameId = reader.Integer();
			TeamId = reader.Integer();
			SummonerId = reader.Integer();

			Ping = reader.Integer();
			TimeSpentInQueue = reader.Integer();

			PremadeSize = reader.Integer();

			ExperienceEarned = reader.Integer();
			BoostedExperienceEarned = reader.Integer();

			IPEarned = reader.Integer();
			BoostedIPEarned = reader.Integer();

			SummonerLevel = reader.Integer();

			SummonerSpell1 = reader.Integer();
			SummonerSpell2 = reader.Integer();

			ChampionId = reader.Integer();

			//May be null
			SkinName = reader.String();
			SkinIndex = reader.Integer();

			ChampionLevel = reader.Integer();

			//Not sure about this
			Items = ParseItemString(reader.String());

			Kills = reader.Integer();
			Deaths = reader.Integer();
			Assists = reader.Integer();

			MinionKills = reader.Integer();

			Gold = reader.Integer();

			DamageDealt = reader.Integer();
			PhysicalDamageDealt = reader.Integer();
			MagicalDamageDealt = reader.Integer();

			DamageTaken = reader.Integer();
			PhysicalDamageTaken = reader.Integer();
			MagicalDamageTaken = reader.Integer();

			TotalHealingDone = reader.Integer();

			TimeSpentDead = reader.Integer();

			LargestMultiKill = reader.Integer();
			LargestKillingSpree = reader.Integer();
			LargestCritcalStrike = reader.Integer();

			//Summoner's Rift/Twisted Treeline

			NeutralMinionsKilled = reader.MaybeInteger();

			TurretsDestroyed = reader.MaybeInteger();
			InhibitorsDestroyed = reader.MaybeInteger();

			//Dominion

			NodesNeutralised = reader.MaybeInteger();
			NodeNeutralisationAssists = reader.MaybeInteger();
			NodesCaptured = reader.MaybeInteger();

			VictoryPoints = reader.MaybeInteger();
			Objectives = reader.MaybeInteger();

			TotalScore = reader.MaybeInteger();
			ObjectiveScore = reader.MaybeInteger();
			CombatScore = reader.MaybeInteger();

			Rank = reader.MaybeInteger();

			PerformExtendedReading(reader);
		}

		string RemoveOuterSymbols(string input)
		{
			string output = input.Substring(1);
			output = output.Remove(output.Length - 1);
			return output;
		}

		int[] ParseItemString(string itemString)
		{
			if (itemString.Length < 4)
				throw new Exception(string.Format("Invalid item string returned by database: {0}", itemString));
			//This check is necessary for SQLite, this format is not used by PostgreSQL
			if (itemString[0] == '\'')
				itemString = RemoveOuterSymbols(itemString);
			itemString = RemoveOuterSymbols(itemString);
			List<string> tokens = itemString.Tokenise(",");
			//The trimming is required for SQLite, not for PostgreSQL
			return (from x in tokens select Convert.ToInt32(x.Trim())).ToArray();
		}

		protected virtual void PerformExtendedReading(DatabaseReader reader)
		{
			reader.SanityCheck(Fields);
		}

		public static string GetFields()
		{
			string[] fields = (from x in Fields select x == "items" ? "cast(player.items as text)" : string.Format("player.{0}", x)).ToArray();
			return fields.FieldString();
		}
	}
}
