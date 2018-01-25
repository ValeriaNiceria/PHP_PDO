<form method="POST" action="cadastrar.php">
    <fieldset>
        <legend>Nova tarefa</legend>

        <label for="nome">Tarefa:</label>
        <input type="text" name="nome" id="nome"/>

        <label for="descricao">Descrição:</label>
        <textarea name="descricao" id="descricao"></textarea>

        <label for="prazo">Prazo:</label>
        <input type="date" name="prazo" id="prazo"/>

        <fieldset>
            <legend>Prioridade</legend>
            <input type="radio" name="prioridade" id="prioridade" value="1" checked/> Baixa
            <input type="radio" name="prioridade" id="prioridade" value="2"/> Média
            <input type="radio" name="prioridade" id="prioridade" value="3"/> Alta
        </fieldset>

        <label for="concluida">Tarefa concluída:</label>
        <input type="checkbox" name="concluida" id="concluida" value="1"/>

        <input type="submit" value="Cadastrar"/>
    </fieldset>
</form>