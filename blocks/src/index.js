import { registerBlockType } from "@wordpress/blocks";
import { RichText } from "@wordpress/block-editor";

import "./editor.scss";

import "./style.scss";

registerBlockType("pisztheme/bold-paragraph", {
  title: "Lead Content",
  icon: "editor-bold",
  category: "text",
  attributes: {
    content: {
      type: "string",
      source: "html",
      selector: "p",
    },
  },
  edit: ({ attributes, setAttributes }) => {
    const onChangeContent = (newContent) => {
      setAttributes({ content: newContent });
    };

    return (
      <RichText
        tagName="p"
        className="bold-paragraph"
        value={attributes.content}
        onChange={onChangeContent}
        placeholder="Wpisz pogrubiony tekst..."
      />
    );
  },
  save: ({ attributes }) => {
    return (
      <RichText.Content
        tagName="p"
        className="bold-paragraph"
        value={attributes.content}
      />
    );
  },
});
