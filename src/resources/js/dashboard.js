import RelationWithDataController from "./controllers/relation_with_data_controller"

application.register("fields--relationWithData", RelationWithDataController);

function onDelete() {
    return confirm("Вы действительно хотите удалить эту строку?");
}

window.onDelete = onDelete;
