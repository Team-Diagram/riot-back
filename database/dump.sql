INSERT INTO place ("id", "name", "type", "people_count", "light_state", "warm_state", "clim_state") VALUES
    ('33f0c468-34bf-4e5e-a2d6-8d90f4a7d1d2', 'A104', 'bureau', 0, false, false, false),
    ('a848cf1a-0e3b-4e89-b6e3-2c7b2163a6f9', 'A107', 'bureau', 0, false, false, false),
    ('67f6e308-7b79-4a7d-9ad9-85a5c24d4db1', 'A108', 'bureau', 0, false, false, false),
    ('efb3b5a7-1f3a-4b4f-a44d-d1c12e9373c0', 'A109', 'bureau', 0, false, false, false),
    ('d583ea32-2c11-4e92-87ef-1b19a59e2e45', 'A110', 'bureau', 0, false, false, false),
    ('9a03d8c0-bcc7-47cc-937d-68117c1a29d4', 'A105', 'salle', 0, false, false, false),
    ('247f7519-ba7f-4c77-b3a1-4d682fc2ff8e', 'A106', 'salle', 0, false, false, false),
    ('5e2e4a32-1b3e-4bc6-8b17-0ff1f3c72f6c', 'A111', 'salle', 0, false, false, false),
    ('84d49fc1-2116-47e0-b5c7-60d20c0c37e7', 'A112', 'salle', 0, false, false, false),
    ('6a98b4f8-9e45-4d78-a07f-78db161628b9', 'A113', 'salle', 0, false, false, false),
    ('f8103f76-458d-4d08-8945-7792dca0e69c', 'cafet 1', 'commun', 0, false, false, false),
    ('b3fc76e9-60e2-4018-b39c-1053c65a8539', 'cafet 2', 'commun', 0, false, false, false),
    ('032e1f5d-2de3-4f29-9a5f-c79e31f78884', 'couloir', 'commun', 0, false, false, false);

--Pour '33f0c468-34bf-4e5e-a2d6-8d90f4a7d1d2', A104
INSERT INTO node ("id", "name", "place_id") VALUES
    ('a4be12de-12c1-4e29-bd28-7e7e8a1fe765', 'mouvement', '33f0c468-34bf-4e5e-a2d6-8d90f4a7d1d2'),
    ('27c8e1c3-7b95-4967-8e50-83fe12f1463d', 'eau', '33f0c468-34bf-4e5e-a2d6-8d90f4a7d1d2'),
    ('5f16f8e5-85a9-4db3-8f99-ff7b24945d6e', 'co2', '33f0c468-34bf-4e5e-a2d6-8d90f4a7d1d2'),
    ('f918bd4f-84a2-4a72-8361-3d19f732a6ff', 'fumee', '33f0c468-34bf-4e5e-a2d6-8d90f4a7d1d2'),
    ('9df08aae-2ce3-4e0d-aae6-d7288ab0e27c', 'temperature', '33f0c468-34bf-4e5e-a2d6-8d90f4a7d1d2'),
    ('63ebfb3f-8500-45a3-9a48-eb8c4f6d6b2f', 'luminosite', '33f0c468-34bf-4e5e-a2d6-8d90f4a7d1d2'),
    ('e1b625a7-d543-4a19-ae3b-593930440a77', 'relay', '33f0c468-34bf-4e5e-a2d6-8d90f4a7d1d2'),
    ('96b7d125-46f9-4fd1-8a84-5a24db47b31d', 'relay', '33f0c468-34bf-4e5e-a2d6-8d90f4a7d1d2'),
    ('a9b03f56-908f-4c37-8f64-5d10097f08cd', 'relay', '33f0c468-34bf-4e5e-a2d6-8d90f4a7d1d2');

-- Pour 'a848cf1a-0e3b-4e89-b6e3-2c7b2163a6f9' A107
INSERT INTO node ("id", "name", "place_id") VALUES
    ('3d64a034-381b-46b7-b2a4-428b1ae4f2b3', 'mouvement', 'a848cf1a-0e3b-4e89-b6e3-2c7b2163a6f9'),
    ('e0d1c8a3-64b4-4d35-8934-1b14a9c5f32a', 'eau', 'a848cf1a-0e3b-4e89-b6e3-2c7b2163a6f9'),
    ('b58e8f59-48af-4eab-a31c-34d5d7a78dbf', 'co2', 'a848cf1a-0e3b-4e89-b6e3-2c7b2163a6f9'),
    ('f7d5163b-003b-4c8c-9f48-268bd87f48e9', 'fumee', 'a848cf1a-0e3b-4e89-b6e3-2c7b2163a6f9'),
    ('83a11e2a-9e34-44e4-9b71-3c5f4183c2f0', 'temperature', 'a848cf1a-0e3b-4e89-b6e3-2c7b2163a6f9'),
    ('d10f7b79-5c7d-4ff1-97f2-7e37ef29e3e9', 'luminosite', 'a848cf1a-0e3b-4e89-b6e3-2c7b2163a6f9'),
    ('15d55d1c-6f2e-49b2-93fe-10586d501cb2', 'relay', 'a848cf1a-0e3b-4e89-b6e3-2c7b2163a6f9'),
    ('2e7eb63a-53e5-4b3c-8199-50bc9beee84d', 'relay', 'a848cf1a-0e3b-4e89-b6e3-2c7b2163a6f9'),
    ('a7e244fb-3db0-4e11-a8c0-7526fddfc6e4', 'relay', 'a848cf1a-0e3b-4e89-b6e3-2c7b2163a6f9');

-- Pour '67f6e308-7b79-4a7d-9ad9-85a5c24d4db1' A108
INSERT INTO node ("id", "name", "place_id") VALUES
    ('28cd4e0d-2c85-441e-9f8a-961a4761d2ed', 'mouvement', '67f6e308-7b79-4a7d-9ad9-85a5c24d4db1'),
    ('90868fc2-7cfd-4d5e-b92c-78af6bc440c6', 'eau', '67f6e308-7b79-4a7d-9ad9-85a5c24d4db1'),
    ('f7580d60-5a64-46f1-9e74-4ac0f536f431', 'co2', '67f6e308-7b79-4a7d-9ad9-85a5c24d4db1'),
    ('0f9e3df6-7a4e-4f92-824b-4e49b8a63be1', 'fumee', '67f6e308-7b79-4a7d-9ad9-85a5c24d4db1'),
    ('f749c13b-3ab1-47a4-979e-48d1a21e8ea2', 'temperature', '67f6e308-7b79-4a7d-9ad9-85a5c24d4db1'),
    ('a8b3c1e5-98f4-4ef5-8c47-1efbc7e7ff17', 'luminosite', '67f6e308-7b79-4a7d-9ad9-85a5c24d4db1'),
    ('68e043cc-0b6e-45b0-97e1-14a1e2429e7a', 'relay', '67f6e308-7b79-4a7d-9ad9-85a5c24d4db1'),
    ('f1e7e5ef-2f7f-41c6-889d-34ddbfbbd9b5', 'relay', '67f6e308-7b79-4a7d-9ad9-85a5c24d4db1'),
    ('f92e7e3d-d301-4f96-ba1c-d0ff83bb6475', 'relay', '67f6e308-7b79-4a7d-9ad9-85a5c24d4db1');

-- Pour 'efb3b5a7-1f3a-4b4f-a44d-d1c12e9373c0' A109
INSERT INTO node ("id", "name", "place_id") VALUES
    ('6e8d22e0-0e96-4b2b-9e3e-7f8c6d6e6010', 'mouvement', 'efb3b5a7-1f3a-4b4f-a44d-d1c12e9373c0'),
    ('3d73a32f-5a9d-4e70-8298-1f2955166aae', 'eau', 'efb3b5a7-1f3a-4b4f-a44d-d1c12e9373c0'),
    ('191a5d12-bf60-4985-8a5a-651ae18054c6', 'co2', 'efb3b5a7-1f3a-4b4f-a44d-d1c12e9373c0'),
    ('c9b1005e-0402-4dbf-9db6-7b9d4c9a4e79', 'fumee', 'efb3b5a7-1f3a-4b4f-a44d-d1c12e9373c0'),
    ('8239921a-57d2-4815-881f-fc91e5b84e75', 'temperature', 'efb3b5a7-1f3a-4b4f-a44d-d1c12e9373c0'),
    ('d2d0434b-1d46-4769-b5c4-23e051e735a9', 'luminosite', 'efb3b5a7-1f3a-4b4f-a44d-d1c12e9373c0'),
    ('97856e37-22d3-4f3a-81d1-f3b7d8e1b986', 'relay', 'efb3b5a7-1f3a-4b4f-a44d-d1c12e9373c0'),
    ('d87c3af0-4fa9-43b5-8c7e-235813f89768', 'relay', 'efb3b5a7-1f3a-4b4f-a44d-d1c12e9373c0'),
    ('784be3c4-8926-4e49-b881-2b3b1f071be9', 'relay', 'efb3b5a7-1f3a-4b4f-a44d-d1c12e9373c0');

-- Pour 'd583ea32-2c11-4e92-87ef-1b19a59e2e45' A110
INSERT INTO node ("id", "name", "place_id") VALUES
    ('9f9946d4-71df-459d-b784-11d9c7a536e0', 'mouvement', 'd583ea32-2c11-4e92-87ef-1b19a59e2e45'),
    ('9ad80929-5e4f-4a84-8dd6-8a9ae2c19a8c', 'eau', 'd583ea32-2c11-4e92-87ef-1b19a59e2e45'),
    ('3f8e1ef7-3a7e-4e3b-99a7-81c9885a623f', 'co2', 'd583ea32-2c11-4e92-87ef-1b19a59e2e45'),
    ('c6220e7e-aa5f-4c36-bc62-2f01e4ed72e6', 'fumee', 'd583ea32-2c11-4e92-87ef-1b19a59e2e45'),
    ('bf3d0c5d-79c0-4c14-86ad-00e1dabf3f37', 'temperature', 'd583ea32-2c11-4e92-87ef-1b19a59e2e45'),
    ('30d152ae-d5e4-4b62-80d2-9c55bb2021d4', 'luminosite', 'd583ea32-2c11-4e92-87ef-1b19a59e2e45'),
    ('a6a38950-0325-4a2f-8eaf-6708ad0a99e5', 'relay', 'd583ea32-2c11-4e92-87ef-1b19a59e2e45'),
    ('90b5c0a0-8582-48b1-9f95-65d1ed8e2b9f', 'relay', 'd583ea32-2c11-4e92-87ef-1b19a59e2e45'),
    ('ab9f525f-8763-43e6-b036-1b55d97bb8ff', 'relay', 'd583ea32-2c11-4e92-87ef-1b19a59e2e45');

-- Pour '9a03d8c0-bcc7-47cc-937d-68117c1a29d4' A105
INSERT INTO node ("id", "name", "place_id") VALUES
    ('d8899ec4-4226-4985-bfe7-60df9f168493', 'mouvement', '9a03d8c0-bcc7-47cc-937d-68117c1a29d4'),
    ('25a13675-d2b5-4c2d-ae03-c87d68a0e413', 'eau', '9a03d8c0-bcc7-47cc-937d-68117c1a29d4'),
    ('f7a5dbcc-91b2-4f14-8e85-7e712ee5281c', 'co2', '9a03d8c0-bcc7-47cc-937d-68117c1a29d4'),
    ('352f3b5f-f75e-4197-a9f4-dff74c27ac2d', 'fumee', '9a03d8c0-bcc7-47cc-937d-68117c1a29d4'),
    ('1ae66047-8a0a-4ea6-a57a-262365d9d0f2', 'temperature', '9a03d8c0-bcc7-47cc-937d-68117c1a29d4'),
    ('2b4b73a1-4d7a-4b9a-b348-8ff86a392154', 'luminosite', '9a03d8c0-bcc7-47cc-937d-68117c1a29d4'),
    ('d9e737ad-9b6a-47d1-bf0f-1e0a9ff1a934', 'relay', '9a03d8c0-bcc7-47cc-937d-68117c1a29d4'),
    ('f27e7810-cd1e-4a02-90d2-eeb0d9c6e4c1', 'relay', '9a03d8c0-bcc7-47cc-937d-68117c1a29d4'),
    ('99402b11-39e2-4579-985f-3059639f956b', 'relay', '9a03d8c0-bcc7-47cc-937d-68117c1a29d4');

-- Pour '247f7519-ba7f-4c77-b3a1-4d682fc2ff8e' A106
INSERT INTO node ("id", "name", "place_id") VALUES
    ('2f7f27a2-2386-4c22-88e1-c9d1b5a5ddc2', 'mouvement', '247f7519-ba7f-4c77-b3a1-4d682fc2ff8e'),
    ('120df616-64a9-46c6-88a6-718e7ce512f1', 'eau', '247f7519-ba7f-4c77-b3a1-4d682fc2ff8e'),
    ('136e134b-1403-4393-84c9-0e91862f577f', 'co2', '247f7519-ba7f-4c77-b3a1-4d682fc2ff8e'),
    ('7e0e49d9-5c9e-4e1e-9de5-bd1e81e8406e', 'fumee', '247f7519-ba7f-4c77-b3a1-4d682fc2ff8e'),
    ('55f804dc-6ae6-4b4a-9f02-51fcf6869422', 'temperature', '247f7519-ba7f-4c77-b3a1-4d682fc2ff8e'),
    ('53a21a15-276f-4e1b-9c3b-2eebdcc53e1d', 'luminosite', '247f7519-ba7f-4c77-b3a1-4d682fc2ff8e'),
    ('75049b42-33af-45c3-a94a-2626d8c7545d', 'relay', '247f7519-ba7f-4c77-b3a1-4d682fc2ff8e'),
    ('6b7d6f6a-80ff-4d53-bf36-7f4df3f97802', 'relay', '247f7519-ba7f-4c77-b3a1-4d682fc2ff8e'),
    ('6942a741-2a36-40b5-bd02-eadce69c8a52', 'relay', '247f7519-ba7f-4c77-b3a1-4d682fc2ff8e');

-- Pour '5e2e4a32-1b3e-4bc6-8b17-0ff1f3c72f6c' A111
INSERT INTO node ("id", "name", "place_id") VALUES
    ('e3c15b7b-08fb-4c46-a2db-c0b7e541d5f1', 'mouvement', '5e2e4a32-1b3e-4bc6-8b17-0ff1f3c72f6c'),
    ('f8779e84-3be4-4cb2-956a-3ce5c7b4da60', 'eau', '5e2e4a32-1b3e-4bc6-8b17-0ff1f3c72f6c'),
    ('b9e9372d-0af2-4fdd-a7b0-6179132b2d02', 'co2', '5e2e4a32-1b3e-4bc6-8b17-0ff1f3c72f6c'),
    ('8e637f7d-94f2-4e01-9d60-3b738c96b5b4', 'fumee', '5e2e4a32-1b3e-4bc6-8b17-0ff1f3c72f6c'),
    ('73ef16d1-6b69-4a38-9070-25cc20db29f7', 'temperature', '5e2e4a32-1b3e-4bc6-8b17-0ff1f3c72f6c'),
    ('dd2ee924-6015-4f24-8ad2-6a4ab1c78d97', 'luminosite', '5e2e4a32-1b3e-4bc6-8b17-0ff1f3c72f6c'),
    ('2e9e07e2-ee20-4db5-b878-5b153e30d88b', 'relay', '5e2e4a32-1b3e-4bc6-8b17-0ff1f3c72f6c'),
    ('b7f9dc2a-59d2-4f59-a32b-c541c942c431', 'relay', '5e2e4a32-1b3e-4bc6-8b17-0ff1f3c72f6c'),
    ('aeb5b89d-309f-4c89-8af7-361c6c7f8652', 'relay', '5e2e4a32-1b3e-4bc6-8b17-0ff1f3c72f6c');

-- Pour '84d49fc1-2116-47e0-b5c7-60d20c0c37e7' A112
INSERT INTO node ("id", "name", "place_id") VALUES
    ('8e696d7e-cc2b-4df4-88ea-bd8238cbe5f0', 'mouvement', '84d49fc1-2116-47e0-b5c7-60d20c0c37e7'),
    ('a8dc7473-4ad5-4b20-b5f7-3d7f9b5aeb5b', 'eau', '84d49fc1-2116-47e0-b5c7-60d20c0c37e7'),
    ('7db8e6ce-c723-4ce4-89d0-5806b594ce89', 'co2', '84d49fc1-2116-47e0-b5c7-60d20c0c37e7'),
    ('a3ebe4b6-8988-4a2d-91b9-48f18d80eefb', 'fumee', '84d49fc1-2116-47e0-b5c7-60d20c0c37e7'),
    ('a2b9cde4-78e5-4f1e-8a6a-01f2492da770', 'temperature', '84d49fc1-2116-47e0-b5c7-60d20c0c37e7'),
    ('30c14884-cb54-437e-88a0-2d726bde29cd', 'luminosite', '84d49fc1-2116-47e0-b5c7-60d20c0c37e7'),
    ('b5d476fc-11df-48c6-9e2d-4ac3f492a5c0', 'relay', '84d49fc1-2116-47e0-b5c7-60d20c0c37e7'),
    ('b3f0e1a6-d56a-405a-947d-d3f8033d9843', 'relay', '84d49fc1-2116-47e0-b5c7-60d20c0c37e7'),
    ('ef8d5b30-c5c0-4e92-bb50-0a31d3f3b4c9', 'relay', '84d49fc1-2116-47e0-b5c7-60d20c0c37e7');

-- Pour '6a98b4f8-9e45-4d78-a07f-78db161628b9' A113
INSERT INTO node ("id", "name", "place_id") VALUES
    ('da95a831-06b3-43e7-8b4b-b8d91e2ff044', 'mouvement', '6a98b4f8-9e45-4d78-a07f-78db161628b9'),
    ('a9a35f7a-aa11-4c2a-8d9e-8e8c9886de04', 'eau', '6a98b4f8-9e45-4d78-a07f-78db161628b9'),
    ('a0128f2c-3897-4dbf-8c08-5f8f1a6dd2f1', 'co2', '6a98b4f8-9e45-4d78-a07f-78db161628b9'),
    ('09c3a6c1-7902-4e2b-ae16-f7b996b28fa0', 'fumee', '6a98b4f8-9e45-4d78-a07f-78db161628b9'),
    ('a208bd0f-89b3-49d9-881d-1c927c95653f', 'temperature', '6a98b4f8-9e45-4d78-a07f-78db161628b9'),
    ('d1d7b82b-2b85-4de4-981a-61b5d44c051f', 'luminosite', '6a98b4f8-9e45-4d78-a07f-78db161628b9'),
    ('4fb9e7a4-7eaa-42fd-9649-34c56ee6e48f', 'relay', '6a98b4f8-9e45-4d78-a07f-78db161628b9'),
    ('e50e03fe-8734-4b1f-91d9-4d6303e7d6ab', 'relay', '6a98b4f8-9e45-4d78-a07f-78db161628b9'),
    ('b1b08ff5-44e5-4d63-a8da-05286f4d7fbf', 'relay', '6a98b4f8-9e45-4d78-a07f-78db161628b9');

-- Pour 'f8103f76-458d-4d08-8945-7792dca0e69c' cafet 1
INSERT INTO node ("id", "name", "place_id") VALUES
    ('3e0a4185-1869-4eaa-af22-736c4a9bca4b', 'mouvement', 'f8103f76-458d-4d08-8945-7792dca0e69c'),
    ('2d8f63e1-646f-4c9e-9d9a-3e97c47a8e59', 'eau', 'f8103f76-458d-4d08-8945-7792dca0e69c'),
    ('e20e6d45-7fb5-4c10-aadd-b9c9b40ab252', 'co2', 'f8103f76-458d-4d08-8945-7792dca0e69c'),
    ('6fc47b2f-4b3f-4b02-82d2-2d3c21fb5f15', 'fumee', 'f8103f76-458d-4d08-8945-7792dca0e69c'),
    ('9a598e16-6d4d-4d1e-9185-6b7f5b57b8d2', 'temperature', 'f8103f76-458d-4d08-8945-7792dca0e69c'),
    ('b1b787c3-9f0d-4fb7-86be-9e5cde1d3ab1', 'luminosite', 'f8103f76-458d-4d08-8945-7792dca0e69c'),
    ('43e2bb50-16a2-46e2-862a-02b36ff20177', 'relay', 'f8103f76-458d-4d08-8945-7792dca0e69c'),
    ('78a63f9b-2d0c-421f-b207-af76866d4b3e', 'relay', 'f8103f76-458d-4d08-8945-7792dca0e69c'),
    ('20989c63-6bb3-47ff-bba1-69f9f158001d', 'relay', 'f8103f76-458d-4d08-8945-7792dca0e69c');

-- Pour 'b3fc76e9-60e2-4018-b39c-1053c65a8539' cafet 2
INSERT INTO node ("id", "name", "place_id") VALUES
    ('2b7a6d2c-6837-421e-bc14-b5a628a8b16c', 'mouvement', 'b3fc76e9-60e2-4018-b39c-1053c65a8539'),
    ('0c425cc2-8394-49c0-9ae2-702d39435b87', 'eau', 'b3fc76e9-60e2-4018-b39c-1053c65a8539'),
    ('feea61f5-df6d-4de0-af74-2dbb7564b1d7', 'co2', 'b3fc76e9-60e2-4018-b39c-1053c65a8539'),
    ('08d8d9f1-7212-439d-9a4f-26fe2e5e179a', 'fumee', 'b3fc76e9-60e2-4018-b39c-1053c65a8539'),
    ('4da9f9d7-2b6d-40cd-b309-4e0c3ddc7324', 'temperature', 'b3fc76e9-60e2-4018-b39c-1053c65a8539'),
    ('768a2b53-bf96-4da4-aa5b-7a74f73e4f55', 'luminosite', 'b3fc76e9-60e2-4018-b39c-1053c65a8539'),
    ('a36a348b-2e57-40d4-a9db-859014c800a2', 'relay', 'b3fc76e9-60e2-4018-b39c-1053c65a8539'),
    ('c7be15b3-776f-4da1-ba97-ae9c85a133f4', 'relay', 'b3fc76e9-60e2-4018-b39c-1053c65a8539'),
    ('f68995f6-40d6-4859-8ab9-3c0e5d2f7fc3', 'relay', 'b3fc76e9-60e2-4018-b39c-1053c65a8539');

-- Pour '032e1f5d-2de3-4f29-9a5f-c79e31f78884' couloir
INSERT INTO node ("id", "name", "place_id") VALUES
    ('ad1246f1-12b5-48a6-8983-6e51a9946e4c', 'mouvement', '032e1f5d-2de3-4f29-9a5f-c79e31f78884'),
    ('7c7d6a5e-40d3-40c7-a2cc-73fdac065b6c', 'eau', '032e1f5d-2de3-4f29-9a5f-c79e31f78884'),
    ('82272369-4ae1-4e8a-894a-18c84e9c8c16', 'co2', '032e1f5d-2de3-4f29-9a5f-c79e31f78884'),
    ('f8dbd3ad-0db7-4f78-8b53-f0328c84e8c2', 'fumee', '032e1f5d-2de3-4f29-9a5f-c79e31f78884'),
    ('a95e6e63-40d5-4e2e-a90c-04c1510d8926', 'temperature', '032e1f5d-2de3-4f29-9a5f-c79e31f78884'),
    ('3e9598e1-c4d3-4a3b-8d36-3d8c1f8098a3', 'luminosite', '032e1f5d-2de3-4f29-9a5f-c79e31f78884'),
    ('6ce9124b-601a-45ff-a7d1-656192c4a1e9', 'relay', '032e1f5d-2de3-4f29-9a5f-c79e31f78884'),
    ('c24c0fb4-3146-45f7-ae6e-26ef6db154a0', 'relay', '032e1f5d-2de3-4f29-9a5f-c79e31f78884'),
    ('7fbb3ed1-d334-4493-9888-b5f1ab6e09f0', 'relay', '032e1f5d-2de3-4f29-9a5f-c79e31f78884');
