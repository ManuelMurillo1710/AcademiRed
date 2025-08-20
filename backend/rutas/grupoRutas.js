const router = require('express').Router();
const authFirebase = require('../middleware/authFirebase');
const {
  listarGrupos,
  crearGrupo,
  unirmeAGrupo,
  salirDeGrupo,
} = require('../controladores/grupoControlador');

router.get('/', authFirebase, listarGrupos);
router.post('/', authFirebase, crearGrupo);
router.post('/:id/unirme', authFirebase, unirmeAGrupo);
router.post('/:id/salir', authFirebase, salirDeGrupo);

module.exports = router;
