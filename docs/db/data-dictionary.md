# Data dictionary

## Scores (`scores`)

|Field|Type|Specifications|Description|
|-|-|-|-|
|id|INT(10)|PRIMARY KEY, NOT NULL, AUTO_INCREMENT, UNSIGNED|The id of the score|
|level_id|INT(10)|NOT NULL, UNSIGNED|The id of the player|
|player_id|INT(10)|NOT NULL, UNSIGNED|The id of the player|
|score|INT(10)|NOT NULL, UNSIGNED|The score of the player|

## Player (`player`)

|Field|Type|Specifications|Description|
|-|-|-|-|
|id|INT(10)|PRIMARY KEY, NOT NULL, AUTO_INCREMENT, UNSIGNED|The id of the player|
|name|VARCHAR(100)|NOT NULL|The real name of the player|
|new_name|VARCHAR(100)|NOT NULL|The new name of the player|

## Level (`level`)

|Field|Type|Specifications|Description|
|-|-|-|-|
|id|INT(10)|PRIMARY KEY, NOT NULL, AUTO_INCREMENT, UNSIGNED|The id of the level|
|name|VARCHAR(100)|NOT NULL|The name of the level|