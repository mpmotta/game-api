CREATE TABLE games (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255) NOT NULL,
    estudio VARCHAR(255) NOT NULL,
    categoria VARCHAR(100) NOT NULL,
    idade VARCHAR(50) NOT NULL,
    valor DECIMAL(10,2) NOT NULL,
    disponibilidade BOOLEAN NOT NULL DEFAULT TRUE
);

INSERT INTO games (nome, estudio, categoria, idade, valor, disponibilidade) VALUES
('Spider-Man 2', 'Insomniac Games', 'Ação/Aventura', '16+', 349.90, TRUE),
('God of War Ragnarök', 'Santa Monica Studio', 'Ação/Aventura', '18+', 299.90, TRUE),
('Final Fantasy XVI', 'Square Enix', 'RPG', '16+', 299.90, TRUE),
('Ratchet and Clank: Rift Apart', 'Insomniac Games', 'Plataforma', '10+', 249.90, TRUE),
('Helldivers 2', 'Arrowhead Game Studios', 'Tiro', '18+', 199.90, TRUE),
('Astro Bot', 'PlayStation Studios', 'Plataforma', '7+', 199.90, TRUE),
('Uncharted: Legacy of Thieves Collection', 'Naughty Dog', 'Ação/Aventura', '16+', 189.90, TRUE),
('The Last of Us Part I', 'Naughty Dog', 'Ação/Aventura', '18+', 299.90, TRUE),
('Ghost of Tsushima: Director\'s Cut', 'Sucker Punch', 'Ação/Aventura', '18+', 249.90, TRUE),
('Death Stranding 2: On the Beach', 'Kojima Productions', 'Aventura', '18+', 349.90, FALSE),
('Forza Horizon 5', 'Playground Games', 'Corrida', '10+', 249.90, TRUE),
('Indiana Jones and the Great Circle', 'MachineGames', 'Ação/Aventura', '16+', 299.90, TRUE),
('GTA 6', 'Rockstar Games', 'Ação/Aventura', '18+', 399.90, TRUE),
('Monster Hunter Wilds', 'Capcom', 'RPG/Ação', '14+', 299.90, TRUE),
('Citizen Sleeper 2: Starward Vector', 'Jump Over the Age', 'RPG', '12+', 159.90, TRUE),
('Split Fiction', 'Narrative Games', 'Aventura', '14+', 179.90, TRUE),
('Kingdom Come: Deliverance 2', 'Warhorse Studios', 'RPG', '18+', 249.90, FALSE),
('Blue Prince', 'Dogubomb', 'Quebra-cabeça', '10+', 89.90, TRUE),
('Promise Mascot Agency', 'Kaizen Game Works', 'Simulação', '7+', 69.90, TRUE),
('Bionic Bay', 'Mureena', 'Plataforma', '10+', 59.90, TRUE);
