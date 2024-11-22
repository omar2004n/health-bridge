--fill users (patients)

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`, `created_at`, `updated_at`) VALUES
(4, 'Alice Johnson', 'alice.johnson@example.com', '$2y$10$v7FDdvC9W0F2PNprggKdxO.J4fGz/QUrpbcy2RiRfKoD8IW39jgbK', 'patient', '2024-11-22 11:14:50', '2024-11-22 11:14:50'),
(5, 'Bob Smith', 'bob.smith@example.com', '$2y$10$DgqCzUiBoRnrPXrEDM1OQuu3XLYk35kurRhIxdxxiQN6un7XA2BEW', 'patient', '2024-11-22 11:14:50', '2024-11-22 11:14:50'),
(6, 'Charlie Davis', 'charlie.davis@example.com', '$2y$10$tnm1GFb1Shfoa9pO9Q8EROKPcBV98DGLnGJ8J4dyGE05Si6CkWhg.', 'patient', '2024-11-22 11:14:50', '2024-11-22 11:14:50'),
(7, 'Diana Evans', 'diana.evans@example.com', '$2y$10$fWXkR3VkRNFrICRgMGLmIuwZ62LFwW15cBKyBFEfeesnen0bY1Az.', 'patient', '2024-11-22 11:14:50', '2024-11-22 11:14:50'),
(8, 'Ethan Williams', 'ethan.williams@example.com', '$2y$10$lnsWM9UCqW9OGUCAWvDyne3W5Oam7Cqzp4t/yiGc99YnzGTvLpRU2', 'patient', '2024-11-22 11:14:50', '2024-11-22 11:14:50'),
(9, 'Fiona Brown', 'fiona.brown@example.com', '$2y$10$3N12UD43RHd2fCI5nXKdee8IaW9KCe/5eOobHzLEHufrrZMRWBz4S', 'patient', '2024-11-22 11:14:51', '2024-11-22 11:14:51'),
(10, 'George Adams', 'george.adams@example.com', '$2y$10$nl3ThY2ow21sQdGPtRWhcOL2TcJDlSAso8Y/s/Nld2yqdIgnUe4h2', 'patient', '2024-11-22 11:14:51', '2024-11-22 11:14:51'),
(11, 'Hannah Clark', 'hannah.clark@example.com', '$2y$10$UYN.IOo3Iod0utXp57z8FO3HhlCfRLpsl5p5yY8rd66L7dZrhI1BO', 'patient', '2024-11-22 11:14:51', '2024-11-22 11:14:51'),
(12, 'Ian Lewis', 'ian.lewis@example.com', '$2y$10$o6FylPeID3wXIG9yiMWXq.KMP5KI/a6uqJgG2eEuw3tEZlHGhwi5m', 'patient', '2024-11-22 11:14:51', '2024-11-22 11:14:51'),
(13, 'Jenna Scott', 'jenna.scott@example.com', '$2y$10$.kP2FnlQ3FrGnC9Z8bmm6uzmBoQbF4iEqf/nk11ZMH8gqjaa/BlWO', 'patient', '2024-11-22 11:14:51', '2024-11-22 11:14:51'),
(14, 'Kevin Harris', 'kevin.harris@example.com', '$2y$10$id9vlwza7XMlxxJ8sZxLmOlRKH4d3gwKTAYQx/nTls1tn/DHrU8UW', 'patient', '2024-11-22 11:14:51', '2024-11-22 11:14:51'),
(15, 'Laura Martin', 'laura.martin@example.com', '$2y$10$mZ4vsiuHmBdocRs/E5ZLnOQJZnvirl0THgPkGe5HRWoOhuvuAJU1i', 'patient', '2024-11-22 11:14:51', '2024-11-22 11:14:51'),
(16, 'Michael Lee', 'michael.lee@example.com', '$2y$10$Tnz8jblgbR2LdCfBy3Sm1.iq4tFVNxoCfOAUvg.2m/qSUv5dZO2sK', 'patient', '2024-11-22 11:14:51', '2024-11-22 11:14:51'),
(17, 'Nina Perez', 'nina.perez@example.com', '$2y$10$rdRUoxDzEP2TLDCMSuanyud4sudd9TLeli8KmWltR2MLUxonO5SEK', 'patient', '2024-11-22 11:14:51', '2024-11-22 11:14:51'),
(18, 'Oscar Young', 'oscar.young@example.com', '$2y$10$ZRUC0sLaiPVBj5VV2.F3deHJ1IfHc7niuaACZ21nvQwd6ltihwFdq', 'patient', '2024-11-22 11:14:51', '2024-11-22 11:14:51');

INSERT INTO `patients` (`user_id`, `phone`, `gender`, `address`, `birth_date`) VALUES
(4, '1234567890', 'female', '123 Main St, City A', '1990-01-01'),
(5, '1234567891', 'male', '456 Elm St, City B', '1985-02-02'),
(6, '1234567892', 'male', '789 Oak St, City C', '1992-03-03'),
(7, '1234567893', 'female', '321 Pine St, City D', '1993-04-04'),
(8, '1234567894', 'male', '654 Maple St, City E', '1991-05-05'),
(9, '1234567895', 'female', '987 Birch St, City F', '1988-06-06'),
(10, '1234567896', 'male', '111 Cedar St, City G', '1989-07-07'),
(11, '1234567897', 'female', '222 Spruce St, City H', '1995-08-08'),
(12, '1234567898', 'male', '333 Walnut St, City I', '1994-09-09'),
(13, '1234567899', 'female', '444 Chestnut St, City J', '1990-10-10'),
(14, '1234567800', 'male', '555 Fir St, City K', '1987-11-11'),
(15, '1234567801', 'female', '666 Redwood St, City L', '1992-12-12'),
(16, '1234567802', 'male', '777 Cypress St, City M', '1991-01-13'),
(17, '1234567803', 'female', '888 Magnolia St, City N', '1990-02-14'),
(18, '1234567804', 'male', '999 Willow St, City O', '1986-03-15');

