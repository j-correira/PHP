# +1 vote for Mickey
# (disneycharacterID = 1)

SELECT * 
FROM se266_001248229.disneyvotes;
INSERT INTO se266_001248229.disneyvotes (disneycharacterID, VoterDateTime)
VALUES (1, NOW());