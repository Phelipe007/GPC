CREATE TABLE Usuario (
    id_usuario INT PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(100),
    telefone VARCHAR(20),
    email VARCHAR(100),
    senha VARCHAR(100),
    cpf VARCHAR(11) UNIQUE,
    ifmt BOOLEAN,
    idade INT
);

CREATE TABLE Eventos (
    id_evento INT PRIMARY KEY AUTO_INCREMENT,
    id_criador INT,
    nome VARCHAR(100),
    data DATE,
    local VARCHAR(100),
    horario TIME,
    percurso VARCHAR(255),
    descricao TEXT,
    FOREIGN KEY (id_criador) REFERENCES Usuario(id_usuario)
);

CREATE TABLE Inscricao (
    id_usuario_inscrito INT,
    id_evento INT,
    PRIMARY KEY (id_usuario_inscrito, id_evento),
    FOREIGN KEY (id_usuario_inscrito) REFERENCES Usuario(id_usuario),
    FOREIGN KEY (id_evento) REFERENCES Eventos(id_evento)
);

CREATE TABLE Aluno_ifmt (
    id_aluno_ifmt INT PRIMARY KEY,
    matricula VARCHAR(20),
    ano INT,
    curso VARCHAR(100),
    turno VARCHAR(20),
    ganhara_nota_por_participar BOOLEAN,
    como_ficou_sabendo VARCHAR(255),
    tem_bicicleta BOOLEAN,
    ja_participou_de_eventos_anteriores BOOLEAN,
    deseja_receber_as_fotos BOOLEAN,
    deseja_receber_convites_de_eventos_futuros BOOLEAN,
    deseja_participar_do_sorteio BOOLEAN,
    qual_categoria VARCHAR(100),
    pratica_atividades_fisicas_frequentemente BOOLEAN,
    gostaria_de_ser_um_patrocinador BOOLEAN,
    FOREIGN KEY (id_aluno_ifmt) REFERENCES Usuario(id_usuario)
);

CREATE TABLE Externo_aluno (
    id_externo_aluno INT PRIMARY KEY,
    escola_que_frequenta VARCHAR(255),
    como_ficou_sabendo VARCHAR(255),
    tem_bicicleta BOOLEAN,
    ja_participou_de_eventos_anteriores BOOLEAN,
    deseja_receber_as_fotos BOOLEAN,
    deseja_receber_convites_de_eventos_futuros BOOLEAN,
    deseja_participar_do_sorteio BOOLEAN,
    qual_categoria VARCHAR(100),
    pratica_atividades_fisicas_frequentemente BOOLEAN,
    gostaria_de_ser_um_patrocinador BOOLEAN,
    FOREIGN KEY (id_externo_aluno) REFERENCES Usuario(id_usuario)
);

CREATE TABLE Externo_nao_aluno (
    id_externo_nao_aluno INT PRIMARY KEY,
    profissao VARCHAR(100),
    vinculo VARCHAR(100),
    como_ficou_sabendo VARCHAR(255)
)