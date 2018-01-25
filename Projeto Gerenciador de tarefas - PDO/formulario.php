<form method="POST">
    <fieldset>
        <legend>Nova tarefa</legend>

        <label for="nome">Tarefa:</label>
        <input type="text" name="nome"/>

        <label for="descricao">Descrição:</label>
        <textarea name="descricao"></textarea>

        <label for="prazo">Prazo:</label>
        <input type="text" name="prazo"/>

        <fieldset>
            <legend>Prioridade</legend>
            <input type="radio" name="prioridade" value="1" checked/> Baixa
            <input type="radio" name="prioridade" value="2"/> Média
            <input type="radio" name="prioridade" value="3"/> Alta
        </fieldset>

        <label for="concluida">Tarefa concluída:</label>
        <input type="checkbox" name="concluida" value="1"/>

        <input type="submit" value="Cadastrar"/>
    </fieldset>
</form>