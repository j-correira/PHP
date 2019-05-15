# View # votes for each character

SELECT disneyvotes.DisneyCharacterID, DisneyCharacterName, Count(*) AS numVotes
FROM disneyvotes
INNER JOIN disneycharacters
ON disneyvotes.DisneyCharacterID = disneycharacters.DisneyCharacterID
GROUP BY DisneyCharacterName
ORDER BY DisneyCharacterID;