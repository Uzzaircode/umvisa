<style>
  .file-drop-area {
  position: relative;
  display: flex;
  align-items: center;
  padding: 25px;
  border: 1px dashed #467fcf;
  border-radius: 3px;
  transition: 0.2s;
}
.file-drop-area.is-active {
  background-color: rgba(255, 255, 255, 0.05);
}

.fake-btn {
  flex-shrink: 0;
  background-color: #467fcf;
  border: 1px solid #467fcf;
  border-radius: 3px;
  padding: 8px 15px;
  margin-right: 10px;
  font-size: 12px;
  text-transform: uppercase;
  color:white;
}

.file-msg {
  font-size: small;
  font-weight: 300;
  line-height: 1.4;
  white-space: nowrap;
  overflow: hidden;
  text-overflow: ellipsis;
}

.file-input {
  position: absolute;
  left: 0;
  top: 0;
  height: 100%;
  width: 100%;
  cursor: pointer;
  opacity: 0;
}
.file-input:focus {
  outline: none;
}
</style>